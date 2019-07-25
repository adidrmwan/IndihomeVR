<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/indihome-vr-firebase-adminsdk-bj3sw-c2c0558454.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();    

        $database = $firebase->getDatabase();

        $ref = $database->getReference('tbl_user');

        $key = $ref->push()->getKey();

        $ref->getChild($key)->set([
            'email' => 'adi@aadi.com',
            'fullname' => 'adi dar',
            'nama' => 'adi',
            'password' => '12345',
            'phone' => '123123'
        ]);

        return $key;
    }
}
