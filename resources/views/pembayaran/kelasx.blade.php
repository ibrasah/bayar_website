@extends('layouts.masteradmin')
@section('content')
<section class="content-header">
        <h1>
          Data Siswa
          <small>Data Pribadi</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{URL('/admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li><a href="{{URL('/admin/pembayaran')}}"><i class="fa fa-dashboard"></i>Pembayaran Siswa</a></li>
          <li class="active">Kelas 10</li>
        </ol>
</section>
<div class="content">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-header">
                <h3 class="box-title">Data Siswa Kelas 10</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example1" style="padding:10px;" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>Foto</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($all_akun as $item)    
                                        <tr>
                                            <td>{{$item['Nama']}}</td>
                                            <td>{{$item['Alamat']}}</td>
                                            <td>{{$item['Email']}}</td>
                                            <td>{{$item['Kelas']}}</td>
                                            <td><img src="{{$item['Foto']}}" style="widht:30px;height:30px;"></td>
                                            <td>
                                                <center><a data-toggle="modal" class="btn btn-success btn-xs" href="{{URL('/admin/pembayaran/kelasx/detail',  $item['UID'])}}">Detail</a> </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

{{-- DATA TABLE --}}
<script src="../../adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="../../adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
<script>
$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>
{{-- ------------------------------------------------------------------------- --}}
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
  firebase.initializeApp(firebaseConfig);

  function logout(){
    firebase.auth().signOut();
  }
;
// });
</script>
@endsection
    