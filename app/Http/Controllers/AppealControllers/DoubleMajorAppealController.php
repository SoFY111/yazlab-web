<?php

namespace App\Http\Controllers\AppealControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
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
            ->documents();

        if ($docRef->size() == 0) {
            $newAppealUUID = (string)Str::uuid();
            $docRef = $this->database->collection('users')
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

            $docRef = $this->database->collection('adminAppeals')
                ->document($newAppealUUID)
                ->set([
                    'appealUUID' => $newAppealUUID,
                    'createdAt' => date_timestamp_get(date_create()),
                    'isStart' => 2,
                    'appealType' => 3,
                ], ['merge' => true]);

            $data = [
                'appealUUID' => $newAppealUUID,
                'firstOpening' => 1
            ];

            dd($docRef);

            return view('appealScreens.doubleMajor', compact('data'));
        }
        foreach ($docRef->rows() as $document) {
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
