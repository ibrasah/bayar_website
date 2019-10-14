<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use RealRashid\SweetAlert\Facades\Alert;
use Session;

class AdminPembayaran extends Controller
{
    public function pembayaran (Request $request){
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        
       return view('pembayaran/pembayaran', compact('Nama'));
    }
    public function kelasx(Request $request)
    {   
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        
        $ref = $database
            ->getReference('Akunku/')
            ->orderByChild('Kelas')
            ->equalTo('10');
            $akuns = $ref->getValue();
            foreach ($akuns as $akun){
                $all_akun[] = $akun;
            }
            // dd($all_akun);
        return view('pembayaran/kelasx', compact('all_akun', 'Nama'));
    }
    public function kelasxi(Request $request)
    {   
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        
        $ref = $database
            ->getReference('Akunku/')
            ->orderByChild('Kelas')
            ->equalTo('11');
            $akuns = $ref->getValue();
            foreach ($akuns as $akun){
                $all_akun[] = $akun;
            }
            // dd($all_akun);
        return view('pembayaran/kelasxi', compact('all_akun', 'Nama'));
    }
    public function kelasxii(Request $request)
    {   
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        
        $ref = $database
            ->getReference('Akunku/')
            ->orderByChild('Kelas')
            ->equalTo('12');
            $akuns = $ref->getValue();
            foreach ($akuns as $akun){
                $all_akun[] = $akun;
            }
            // dd($all_akun);
        return view('pembayaran/kelasxii', compact('all_akun', 'Nama'));
    }

    public function detail($uid)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $ref = $database
            ->getReference('SPP/'.$uid);
        $data_akun = $ref->getValue();
        foreach($data_akun as $data){
            $data_profile[] = $data; 
        }

        $ref = $database->getReference('Akunku/'.$uid);
        $data_akun = $ref->getValue();
        foreach($data_akun as $data){
            $data_profilku[] = $data; 
        }
        // dd($data_profilku);
        
        return view('pembayaran/detail', compact('data_profilku', 'data_profile', 'uid'));
    }
}