@extends('layouts.masteradmin')
@section('content')
<section class="content-header">
    <h1>
      Data Siswa
      <small>Data Pribadi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL('/admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li class="active">Pembayaran Siswa</li>
    </ol>
</section>
<div class="content">
  <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>Kelas 10</h3>
            
            <p>119 SISWA</p>
          </div>
          <div class="icon">
            <i class="ion ion-school"></i>
          </div>
          <a href="{{URL('/admin/pembayaran/kelasx')}}" class="small-box-footer">CEK <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary text-primary">
          <div class="inner">
            <h3>Kelas 11</h3>
            
            <p>119 SISWA</p>
          </div>
          <div class="icon">
            <i class="ion ion-school"></i>
          </div>
          <a href="{{URL('/admin/pembayaran/kelasxi')}}" class="small-box-footer">CEK <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>Kelas 12</h3>
            
            <p>119 SISWA</p>
          </div>
          <div class="icon">
            <i class="ion ion-school"></i>
          </div>
          <a href="{{URL('/admin/pembayaran/kelasxii')}}" class="small-box-footer">CEK <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
  </div>
</div>


@endsection
  <script src="{{ asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
  <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
  <script>
    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyDWenV1kmkCEK8g0lwxEg1EV95Q5dVXRlk",
        authDomain: "bayars-53bb2.firebaseapp.com",
        databaseURL: "https://bayars-53bb2.firebaseio.com",
        projectId: "bayars-53bb2",
        storageBucket: "bayars-53bb2.appspot.com",
        messagingSenderId: "366526935281",
        appId: "1:366526935281:web:df465b12fd88fcf2c8b950"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
  </script>