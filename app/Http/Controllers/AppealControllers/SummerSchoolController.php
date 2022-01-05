<?php

namespace App\Http\Controllers\AppealControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;

class SummerSchoolController extends Controller
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
            ->where('appealType', '=', 3)
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
                    'appealType' => 3,
                    'firstOpening' => 1
                ], ['merge' => true]);

            $data = [
                'appealUUID' => $newAppealUUID,
                'firstOpening' => 1
            ];

            return view('appealScreens.summerSchool', compact('data'));
        }
        foreach ($docRef->rows() as $document) {
            if (!$document->exists()) return view('appealScreens.summerSchool');
            else {
                $data = (object)$document->data();
                return view('appealScreens.summerSchool', compact('data'));
            }
        }
    }
}
