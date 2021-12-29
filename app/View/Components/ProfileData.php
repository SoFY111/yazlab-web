<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;
use Kreait\Firebase\Firestore;
use Kreait\Firebase\Storage;
use Illuminate\Support\Facades\Log;

class ProfileData extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    protected $database;
    protected $storage;
    public $userName;
    public $profilePhoto;

    public function __construct(Firestore $firestore, Storage $storage)
    {
        $this->database = $firestore->database();
        $this->storage = $storage->getStorageClient();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            $currentUserId = Session::get('firebaseUserId');
            $docRef = $this->database->collection('users')->document($currentUserId);
            $snapshot = $docRef->snapshot();
            if ($snapshot->exists()) {
                $expiresAt = new \DateTime('tomorrow');
                $this->userName = $snapshot->data()['name'];
                $this->profilePhoto = app('firebase.storage')->getBucket()->object('images/userProfilePicture/'.$snapshot->data()['profilePhoto'])->signedUrl($expiresAt);
            } else {
                printf('Veri Tabanı Hatası..');
            }
        }
        return view('components.profile-data');
    }
}
