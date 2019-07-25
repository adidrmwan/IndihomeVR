<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class UserController extends Controller
{
    public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/indihome-vr-firebase-adminsdk-bj3sw-c2c0558454.json');

        $firebase =(new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://indihome-vr.firebaseio.com/')
            ->create();

            $database = $firebase->getDatabase();

            $ref = $database->getReference('tbl_user');

            $users =  $ref->getValue();

            foreach ($users as $user) {
                $all_users[] = $user;
            }
            
            return view('pages.user', compact('all_users'));
    }
    
    public function store(Request $request) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/indihome-vr-firebase-adminsdk-bj3sw-c2c0558454.json');

        $firebase =(new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://indihome-vr.firebaseio.com/')
            ->create();

            $database = $firebase->getDatabase();

            $ref = $database->getReference('tbl_user');

            $nama           = $request->nama;
            $fullname       = $request->fullname;
            $email          = $request->email;
            $password       = $request->password;
            $phone          = $request->phone;

            $key = $ref->push()->getKey();
            
            $ref->getChild($key)->set([
                'nama'      => $nama,
                'fullname' => $fullname,
                'email'     => $email,
                'password'      => $password,
                'phone'      => $phone
            ]);

            $users =  $ref->getValue();

            foreach ($users as $user) {
                $all_users[] = $user;
            }
            return view('pages.user', compact('all_users'));
    }
}
