<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $database;
    protected $storage;
    protected $currentUserId;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        if (!Session::has('firebaseUserId') && !Session::has('idToken')) redirect()->route('login');
        $this->database = $firestore->database();
        $this->storage = $storage->getStorageClient();
    }

    public function changeAppealOpening(Request $request){
        $this->currentUserId = Session::get('firebaseUserId');
        $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->document($request->appealUUID)
            ->set([
                'firstOpening'=> 0
            ], ['merge' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $fileName
     *
     */
    public function deleteFile($appealUUID, $fileType)
    {
        $this->currentUserId = Session::get('firebaseUserId');

        $appeal = $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->document($appealUUID)
            ->snapshot();

        $fileName = $appeal['files'][$fileType];

        if($appeal['appealType'] == 0 || $appeal['appealType'] == 1) $totalFile = 5;
        else $totalFile = 4;
        $fileCount = 0;
        foreach ($appeal['files'] as $appealFile) {
            if($appealFile != null) $fileCount++;
        }

        $fileExt = explode('.', $fileName)[1];
        $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->document($appealUUID)
            ->set([
                'files'=>[
                    $fileType => null,
                ],
                'percent' => (($fileCount - 1) / $totalFile) * 100,
            ], ['merge' => true]);

        $this->database->collection('adminAppeals')
            ->document($appealUUID)
            ->set([
                'percent' => (($fileCount - 1) / $totalFile) * 100,
            ], ['merge' => true]);

        if ($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg') $filePath = "images";
        else if ($fileExt == 'pdf') $filePath = "pdf";
        else $filePath = "documents";

        app('firebase.storage')->getBucket()->object($filePath.'/'.$appealUUID.'/'.$fileName)->delete();
        return json_encode(['msg'=>'silindi']);
    }

    public function uploadFile(Request $request){
        if ($request->hasFile('file')){
            $this->currentUserId = Session::get('firebaseUserId');
            $userRef = $this->database->collection('users')->document($this->currentUserId)->snapshot();

            $studentNumber = $userRef['studentNumber'];
            $userName = str_replace(' ', '-', $userRef['name']);

            $fileName = $studentNumber.'_'.$userName.'_'.date_timestamp_get(date_create()).'_'.$request->appealUUID.'_'.$request->fileType.'.'.$request->file->extension();

            $appeal = $this->database->collection('users')
                ->document($this->currentUserId)
                ->collection('appeals')
                ->document($request->appealUUID)
                ->snapshot();

            if($appeal['appealType'] == 0 || $appeal['appealType'] == 1) $totalFile = 5;
            else $totalFile = 4;

            $fileCount = 0;
            foreach ($appeal['files'] as $appealFile) {
                if($appealFile != null) $fileCount++;
            }


            $this->database->collection('users')
                ->document($this->currentUserId)
                ->collection('appeals')
                ->document(request()->appealUUID)
                ->set([
                    'files'=>[
                        $request->fileType => $fileName,
                    ],
                    'percent' => (($fileCount + 1) / $totalFile) * 100,
                ], ['merge' => true]);

            $this->database->collection('adminAppeals')
                ->document($request->appealUUID)
                ->set([
                    'percent' => (($fileCount + 1) / $totalFile) * 100,
                ], ['merge' => true]);

            if ($request->file->extension() == 'png' || $request->file->extension() == 'jpg' || $request->file->extension() == 'jpeg') $filePath = "images";
            else if ($request->file->extension() == 'pdf') $filePath = "pdf";
            else $filePath = "documents";

            $file = fopen($request->file, 'r');
            $bucket = $this->storage->bucket('yazlab-proje-687f5.appspot.com');
            $bucket->upload($file, [
                'name' => $filePath.'/'.request()->appealUUID.'/'.$fileName
            ]);

            return json_encode($fileName);
        }
    }

    public function storeAppeal(Request $request){
        $this->currentUserId = Session::get('firebaseUserId');

        $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->document($request->appealUUID)
            ->set([
                'isStart' => 1
            ], ['merge' => true]);

        $this->database->collection('adminAppeals')
            ->document($request->appealUUID)
            ->set([
                'isStart' => 1
            ], ['merge' => true]);

        return redirect()->route('dashboard');
    }

}
