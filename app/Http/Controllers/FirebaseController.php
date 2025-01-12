<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Kreait\Firebase\Firestore;


class FirebaseController extends Controller
{
    protected $auth, $database, $firestoreDatabase;

    public function __construct(Firestore $firestore)
    {

        $factory = (new Factory)
            ->withServiceAccount(base_path().'\firebaseAdminCred.json')
            ->withDatabaseUri('https://yazlab-proje-687f5.appspot.com/');
            //->withServiceAccount(__DIR__.'\configFirebase.json')
            //->withDatabaseUri('https://YOUR-FIREBASE-PROJECT.firebaseio.com/');

        $this->auth = $factory->createAuth();
    }

    public function signUpGet(){
        return view('register');
    }

    public function signUpPost(Request $request)
    {
        $emaill = $request->email;
        $pass = $request->password;

        try {
            $newUser = $this->auth->createUserWithEmailAndPassword($emaill, $pass);

            $this->firestoreDatabase->collection('users')
                ->document($newUser->uid)
                ->set([
                    'studentNumber' => $request->studentNumber,
                    'name' => $request->nameSurname,
                    'phoneNumber' => [
                        'countryCode' => 'TR',
                        'phoneInputValue' => $request->phone
                    ],
                    'countryIdentifier' => $request->identifierNumber,
                    'adres' => $request->adress,
                    'ogrSinif' => $request->class,
                    'type' => 0,
                    'email' => $request->email,
                ],['merge' => true]);

            return view('login');

        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'The email address is already in use by another account.':
                    dd("E-mail zaten kayıtlı.");
                    break;
                case 'A password must be a string with at least 6 characters.':
                    dd("Şifre en az 6 karakter olmalı..");
                    break;
                default:
                    dd($e->getMessage());
                    break;
            }
        }
    }

    public function signIn(Request $request)
    {

        $request->validate([
           'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->post('email');
        $pass = $request->post('password');

        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $pass);

            Session::put('firebaseUserId', $signInResult->firebaseUserId());
            Session::put('idToken', $signInResult->idToken());
            Session::save();
            return redirect()->route('dashboard');

        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect()->route('login')->withErrors('Hatalı şifre veya E-posta..');
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect()->route('login')->withErrors('Hatalı E-Posta..');
                    break;
                default:
                    return redirect()->route('login')->withErrors('Bizimle iletişime geçiniz. '. $e->getMessage());
                    break;
            }
        }
    }

    public function signOut()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::save();
            return redirect()->route('login');
        } else {
            return redirect()->route('login');
        }
    }

    public function userCheck()
    {
        // $idToken = "";

        // $this->auth->revokeRefreshTokens("");

         if (Session::has('firebaseUserId') && Session::has('idToken')) {
             $idToken =Session::get('idToken');
//             dd("User masih login.");
         } else {
             dd("User sudah logout.");
         }

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($idToken, $checkIfRevoked = true);
            dump($verifiedIdToken);
            dump($verifiedIdToken->claims()->get('sub')); // uid
            dump($this->auth->getUser($verifiedIdToken->claims()->get('sub')));
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }

        // try {
        //     $verifiedIdToken = $this->auth->verifyIdToken(Session::get('idToken'), $checkIfRevoked = true);
        //     $response = "valid";
        //     // dd("Valid");
        //     // $uid = $verifiedIdToken->getClaim('sub');
        //     // $user = $auth->getUser($uid);
        //     // dump($uid);
        //     // dump($user);
        // } catch (\InvalidArgumentException $e) {
        //     // dd('The token could not be parsed: '.$e->getMessage());
        //     $response = "The token could not be parsed: " . $e->getMessage();
        // } catch (InvalidToken $e) {
        //     // dd('The token is invalid: '.$e->getMessage());
        //     $response = "The token is invalid: " . $e->getMessage();
        // } catch (RevokedIdToken $e) {
        //     $response = "revoked";
        // } catch (\Throwable $e) {
        //     if (substr(
        //         $e->getMessage(),
        //         0,
        //         21
        //     ) == "This token is expired") {
        //         $response = "expired";
        //     } else {
        //         $response = "something_wrong";
        //     }
        // }
        // return $response;
    }

}
