<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ProdukController extends Controller
{
    public function index() {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/indihome-vr-firebase-adminsdk-bj3sw-c2c0558454.json');

        $firebase =(new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://indihome-vr.firebaseio.com/')
            ->create();

            $database = $firebase->getDatabase();

            $ref = $database->getReference('tbl_produk');

            $produks =  $ref->getValue();

            foreach ($produks as $produk) {
                $all_produks[] = $produk;
            }
            
            return view('pages.produk', compact('all_produks'));
    }
    
    public function store(Request $request) {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/indihome-vr-firebase-adminsdk-bj3sw-c2c0558454.json');

        $firebase =(new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://indihome-vr.firebaseio.com/')
            ->create();

            $database = $firebase->getDatabase();

            $ref = $database->getReference('tbl_produk');

            $nama       = $request->nama;
            $deskripsi  = $request->deskripsi;
            $harga      = $request->harga;
            $path      = $request->path;

            $key = $ref->push()->getKey();
            
            $ref->getChild($key)->set([
                'nama'      => $nama,
                'deskripsi' => $deskripsi,
                'harga'     => $harga,
                'path'      => $path
            ]);

            $produks =  $ref->getValue();

            foreach ($produks as $produk) {
                $all_produks[] = $produk;
            }
            return view('pages.produk', compact('all_produks'));
    }
}
