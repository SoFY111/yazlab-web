<?php

namespace App\Http\Controllers\AppealControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;

class VerticalAppealController extends Controller
{
    protected $database;
    protected $storage;
    protected $currentUserId;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        if (!Session::has('firebaseUserId') && !Session::has('idToken')) redirect()->route('login');
        //$this->database = $firestore->database();
        //$this->storage = $storage->getStorageClient();
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
            ->where('appealType', '=', 1)
            ->where('isStart', '=', 2)
            ->documents();

        if ($docRef->size() == 0) {
            $newAppealUUID = (string)Str::uuid();
            $this->database->collection('users')
                ->document($this->currentUserId)
                ->collection('appeals')
                ->document($newAppealUUID)
                ->set([
                    'appealUUID' => $newAppealUUID,
                    'createdAt' => date_timestamp_get(date_create()),
                    'isStart' => 2,
                    'appealType' => 1,
                    'firstOpening' => 1,
                    'percent' => 0,
                    'files' => [],
                    'result' => [
                        'description' => null,
                        'status' => 2
                    ]
                ], ['merge' => true]);

            $data = (object)[
                'appealUUID' => $newAppealUUID,
                'firstOpening' => 1
            ];

            $this->database->collection('adminAppeals')
                ->document($newAppealUUID)
                ->set([
                    'appealUUID' => $newAppealUUID,
                    'userUUID' => $this->currentUserId,
                    'createdAt' => date_timestamp_get(date_create()),
                    'isStart' => 2,
                    'appealType' => 1,
                    'result' => [
                        'description' => null,
                        'status' => 2
                    ],
                    'percent' => 0

                ], ['merge' => true]);


            return view('appealScreens.verticalAppeal', compact('data'));
        }
        foreach ($docRef->rows() as $document) {
            if (!$document->exists()) return view('appealScreens.verticalAppeal');
            else {
                $data = (object)$document->data();
                return view('appealScreens.verticalAppeal', compact('data'));
            }
        }
    }
}
