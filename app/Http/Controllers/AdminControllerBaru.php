<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use RealRashid\SweetAlert\Facades\Alert;
use Session;


class AdminControllerBaru extends Controller
{   
    public function master (Request $request){
       
        $login = $request->session()->get('login');
        $Nama = $request->session()->get('Nama');
        if ($login == TRUE){ 
            return view('layoutBaru.master', compact('Nama'));
        } else {
            return redirect('/login');
        }
    }
    
    public function master2 (Request $request){
       
        return view('layoutbaru/masterdua');
    }
    public function dashboard(Request $request)
    {

        $login = $request->session()->get('login');
        $Nama = $request->session()->get('Nama');
        if ($login == TRUE){ 
            return view('baruAdmin.dashboard', compact('Nama'));
        } else {
            return redirect('/login');
        }
        // $request->session()->flush();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginproses(Request $request)
    {
        $nama = $request->nama;
        $status = $request->status;
            Session::put('Nama', $nama);
            Session::put('Status', $status);
            Session::put('login', TRUE);
            echo 1;
            // dd(  $nama+" "+$status);
    }

    public function index(Request $request)
    {
        $login = $request->session()->get('login');
        if ($login == TRUE){ 
            return redirect('/admin');
        } else {
            return view('login');
        }
       
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('admin');
    }

    public function siswa(Request $request)
    {   
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        $ref = $database
            ->getReference('Akunku');
            $akuns = $ref->getValue();
            foreach ($akuns as $akun){
                $all_akun[] = $akun;
            }
            // dd($all_akun);
        return view('baruAdmin/siswa', compact('all_akun', 'Nama'));
    }

    public function addSiswa(Request $request)
    {   
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();

        $Nama = $request->session()->get('Nama');
        $ref = $database
            ->getReference('Akunku');
            $akuns = $ref->getValue();
            foreach ($akuns as $akun){
                $all_akun[] = $akun;
            }
            // Alert::message($nama);
        return view('admin/addsiswa', compact('all_akun', 'Nama'));
        Alert::message('Data SISWA BERHASIL DITAMBAHKAN!!');
    }

    public function addDataSiswa(Request $request)
    {
        
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $refSPP = $database->getReference('SPP');
        $refAkunku = $database->getReference('Akunku');
        
        $uid = $request->uid;
        $Nama = $request->Nama;
        $NIS = $request->NIS;
        $Kelas = $request->Kelas;
        $Password = $request->Password;
        $Alamat = $request->Alamat;
        $Email = $request->Email;
        $Jurusan = $request->Jurusan;
        $Foto = $request->Foto;
        $Status = $request->Status;
        $TunggakanLainnya = $request->TunggakanLainnya;
        $TunggakanSPP = $request->TunggakanSPP;
        $TunggakanTotal = $request->TunggakanTotal;

        
        $key = $refAkunku->push()->getKey();
        $key = $refSPP->push()->getKey();
        

        $refAkunku->getChild($uid)->set([
            'UID'=>$uid,
            'Nama'=>$Nama,
            'NIS'=>$NIS,
            'Kelas'=>$Kelas,
            'Password'=>$Password,
            'Alamat'=>$Alamat,
            'Email'=>$Email,
            'Jurusan'=>$Jurusan,
            'Foto'=>$Foto,
            'Status'=>$Status,
            'TunggakanLainnya'=>$TunggakanLainnya,
            'TunggakanSPP'=>$TunggakanSPP,
            'TunggakanTotal'=>$TunggakanTotal,
        ]);
        
        $bulan = [
            "1Januari",
            "2Februari",
            "3Maret",
            "4April",
            "5Mei",
            "6Juni",
            "7Juli",
            "8Agustus",
            "90September",
            "91Oktober",
            "92November",
            "93Desember"
        ];

        foreach ($bulan as $bulans){
            $refSPP->getChild($uid)->getChild('2019')->getChild($bulans)->set([
                'bukti'=>'null',
                'status'=>'B',]);
            $refSPP->getChild($uid)->getChild('2020')->getChild($bulans)->set([
                'bukti'=>'null',
                'status'=>'B',]);
            $refSPP->getChild($uid)->getChild('2021')->getChild($bulans)->set([
                    'bukti'=>'null',
                    'status'=>'B',]);
        }
        alert()->success('Success','DATA SISWA BERHASIL DITAMBAHKAN ! ');
        return redirect('/admin/siswa');
        
    }

    public function coba (Request $request){
       
        return view('admin/coba');
    }

    
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($uid)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Akunku/'.$uid);
        $data_akun = $ref->getValue();
        foreach($data_akun as $data){
            $data_profile[] = $data; 
        }
        // dd($data_profile);
        
        return view('baruAdmin/detail_siswa', compact('data_profile'));
        
    }

    public function deleteUser($uid)
    {
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/webfirebase.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri('https://bayars-53bb2.firebaseio.com')
            ->create();
        $database = $firebase->getDatabase();
        $ref = $database->getReference('Akunku/');
        $ref->getChild($uid)->remove();

        alert()->success('DELETED','Data Siswa Berhasil Dihapus!! ');
        return redirect('/admin/siswa');
    }
}
