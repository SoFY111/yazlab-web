<?php

namespace App\Http\Controllers\AppealControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;
use function Symfony\Component\String\u;

class DoubleMajorAppealController extends Controller
{
    protected $database;
    protected $storage;
    protected $currentUserId;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        if (!Session::has('firebaseUserId') && !Session::has('idToken')) redirect()->route('login');
        $this->database = $firestore->database();
        $this->storage = $storage->getStorageClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->currentUserId = Session::get('firebaseUserId');
        $docRef = $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->where('appealType', '=', 0)
            ->where('isStart', '=', 2)
            ->documents()
            ->rows();

        foreach ($docRef as $document) {
            if (!$document->exists()) return view('appealScreens.doubleMajor');
            else {
                $data = (object) $document->data();
                return view('appealScreens.doubleMajor', compact('data'));
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function uploadFile(Request $request){
        if ($request->hasFile('file')){
            $this->currentUserId = Session::get('firebaseUserId');
            $userRef = $this->database->collection('users')->document($this->currentUserId)->snapshot();

            $studentNumber = $userRef['studentNumber'];
            $userName = str_replace(' ', '-', $userRef['name']);

            $fileName = $studentNumber.'_'.$userName.'_'.date_timestamp_get(date_create()).'_'.$request->appealUUID.'_'.$request->fileType.'.'.$request->file->extension();

            if ($request->file->extension() == 'png' || $request->file->extension() == 'jpg' || $request->file->extension() == 'jpeg') $filePath = "images";
            else if ($request->file->extension() == 'pdf') $filePath = "pdf";
            else $filePath = "documents";

            $this->database->collection('users')
                ->document($this->currentUserId)
                ->collection('appeals')
                ->document(request()->appealUUID)
                ->set([
                    'files'=>[
                        $request->fileType=> $fileName
                    ]
                ], ['merge' => true]);

            $file = fopen($request->file, 'r');
            $bucket = $this->storage->bucket('yazlab-proje-687f5.appspot.com');
            $bucket->upload($file, [
                'name' => $filePath.'/'.request()->appealUUID.'/'.$fileName
            ]);
            return json_encode($fileName);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $fileName
     *
     */
    public function deleteFile($fileName, $fileType)
    {
        $this->currentUserId = Session::get('firebaseUserId');

        $appealUUID = explode('_', $fileName);
        $fileExt = explode('.', $appealUUID[4])[1];
        $this->database->collection('users')
            ->document($this->currentUserId)
            ->collection('appeals')
            ->document($appealUUID[3])
            ->set([
               'files'=>[
                   $fileType => null,
                ],
            ], ['merge' => true]);

        if ($fileExt == 'png' || $fileExt == 'jpg' || $fileExt == 'jpeg') $filePath = "images";
        else if ($fileExt == 'pdf') $filePath = "pdf";
        else $filePath = "documents";

        app('firebase.storage')->getBucket()->object($filePath.'/'.$appealUUID[3].'/'.$fileName)->delete();
        return json_encode(['msg'=>'silindi']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
