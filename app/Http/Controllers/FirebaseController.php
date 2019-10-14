<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Akunku');
        
        $akun = $ref->getValue();
        foreach ($akun as $akuns){
            $all_akun[] = $akuns;
        }
        return view('welcome',compact('all_akun'));
    }
    
    public function addjob(Request $request)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Akunku');
        
        $Nama = $request->Nama;
        $Status = $request->Status;
        
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
            'Nama'=>$Nama,
            'Status'=>$Status,
        ]);
        
        $akun = $ref->getValue();
        foreach ($akun as $akuns){
            $all_akun[] = $akuns;
        }
        return view('welcome',compact('all_akun'));
    }

    public function crud2()
    {
        return view('wewcrud');
    }

    public function add()
    {   
        return view('welcome');
    }
    
    public function conto()
    {   
        return view('layouts.masterconto');
    }
}
