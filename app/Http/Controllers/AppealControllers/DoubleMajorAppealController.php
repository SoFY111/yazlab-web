<?php

namespace App\Http\Controllers\AppealControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;

class DoubleMajorAppealController extends Controller
{

    protected $database;
    protected $storage;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        $this->database = $firestore->database();
        $this->storage = $storage->getStorageClient();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            $currentUserId = Session::get('firebaseUserId');
            $docRef = $this->database->collection('users')->document($currentUserId);
            $snapshot = $docRef->snapshot();
            if ($snapshot->exists()) {

                $profilePhoto = $this->storage->bucket('yazlab-proje-687f5.appspot.com/images/userProfilePicture/'.$snapshot->data()['profilePhoto'])->exists();
                //$profilePhoto = $this->storage->bucket('/images/userProfilePicture/'.$snapshot->data()['profilePhoto']);
                print_r($profilePhoto);
                dd($snapshot->data());

            } else {
                printf('Veri Tabanı Hatası..');
            }
        }

        return view('appealScreens.doubleMajor');
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
