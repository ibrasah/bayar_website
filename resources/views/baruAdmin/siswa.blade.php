
@extends('layoutbaru.master')
@section('contentdua')
<div class="content">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-header">
                <h3 class="box-title">Data Siswa</h3>
            </div>
            <!-- /.box-body -->
            <div class="box-body">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="col-sm-12">
                        <table id="example1" style="padding:10px;" class="table table-bordered table-striped dataTable"
                            role="grid" aria-describedby="example1_info">
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
                                        <a data-toggle="modal" class="btn btn-success btn-xs"
                                            href="{{URL('/admindua/siswa/detail',  $item['UID'])}}">Detail</a>
                                        {{-- <button data-toggle="modal" class="btn btn-primary btn-xs" onclick="update('{{$item['UID']}}')"
                                        data-id="'+index+'">Update</button> --}}
                                        <button data-toggle="modal" data-target="#remove-modal"
                                            class="btn btn-danger btn-xs removeData" data-id="'+index+'">Delete</button>
                                        {{-- <a href="{{URL('/admin/siswa/delete',  $item['UID'])}}" class="btn
                                        btn-danger btn-xs">Delete</a> --}}
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
<!-- Delete Model -->
<form action="" method="POST" class="users-remove-record-model">
    <div id="remove-modal" class="modal modal-danger fade in" tabindex="-1" role="dialog"
        aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Delete Data</h4>
                    <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4>Yakin HAPUS Data Siswa ini?</h4>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                        data-dismiss="modal">Keluar</button>
                    <a href="{{URL('/admin/siswa/delete',  $item['UID'])}}"
                        class="btn btn-success waves-effect waves-light deleteMatchRecord">Yakin</a>
                    {{-- <button type="button" href="{{URL('/admin/siswa/delete',  $item['UID'])}}" class="btn
                    btn-danger waves-effect waves-light deleteMatchRecord">Delete</button> --}}
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Update Model -->
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:40%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal"
                        aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form"
                        data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light"
                        onclick="updateUserRecord()">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- View Model --}}


<!------------------------------------------------------------------------------->

{{-- DATA TABLE --}}

<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
{{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> --}}
<script type="text/javascript" charset="utf8" src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

<script>
$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>
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
        firebase.initializeApp(firebaseConfig);

        function logout(){
          firebase.auth().signOut();
        }
      ;
      function update(uid){
          firebase.database().ref('Akunku/' + uid).on('value', function(snapshot) {
              var values = snapshot.val();
              var updateData = 
              '<div class="col-md-6">\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Nama</label>\
                      <div class="col-md-12">\
                          <input id="uid" type="hidden" value="'+values.UID+'">\
                          <input id="status" type="hidden" value="'+values.Status+'">\
                          <input id="nama" type="text" class="form-control" name="first_name" value="'+values.Nama+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="last_name" class="col-md-12 col-form-label">Alamat</label>\
                      <div class="col-md-12">\
                          <input id="alamat" type="text" class="form-control" name="last_name" value="'+values.Alamat+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Email</label>\
                      <div class="col-md-12">\
                          <input id="email" type="text" class="form-control" name="first_name" value="'+values.Email+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="last_name" class="col-md-12 col-form-label">Password</label>\
                      <div class="col-md-12">\
                          <input id="password" type="text" class="form-control" name="last_name" value="'+values.Password+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Tunggakan Lainnya</label>\
                      <div class="col-md-12">\
                          <input id="tunggakanlainnya" type="text" class="form-control" name="first_name" value="'+values.TunggakanLainnya+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Foto</label>\
                      <div class="col-md-12">\
                          <img id="foto" height="100" width="100" src="'+values.Foto+'">\
                      </div>\
                  </div>\
              </div>\
              \
              <div class="col-md-6">\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Jurusan</label>\
                      <div class="col-md-12">\
                          <input id="jurusan" type="text" class="form-control" name="first_name" value="'+values.Jurusan+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="last_name" class="col-md-12 col-form-label">Kelas</label>\
                      <div class="col-md-12">\
                          <input id="kelas" type="text" class="form-control" name="last_name" value="'+values.Kelas+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">NIS</label>\
                      <div class="col-md-12">\
                          <input id="nis" type="text" class="form-control" name="first_name" value="'+values.NIS+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="last_name" class="col-md-12 col-form-label">Tunggakan SPP</label>\
                      <div class="col-md-12">\
                          <input id="tunggakanspp" type="text" class="form-control" name="last_name" value="'+values.TunggakanSPP+'" required autofocus>\
                      </div>\
                  </div>\
                  <div class="form-group">\
                      <label for="first_name" class="col-md-12 col-form-label">Tunggakan Total</label>\
                      <div class="col-md-12">\
                          <input id="tunggakantotal" type="text" class="form-control" name="first_name" value="'+values.TunggakanTotal+'" required autofocus>\
                      </div>\
                  </div>\
              </div>';
                  console.log(updateData);
                  $('#updateBody').html(updateData);
                  // alert('asf')
                  $('#update-modal').modal('show');
                 
          });
      }
      function updateUserRecord(){
          var id = $('#uid').val();
          var nama = $('#nama').val();
          var status = $('#status').val();
          var alamat = $('#alamat').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var tunggakanlainnya = $('#tunggakanlainnya').val();
          var foto = document.getElementById("foto").src;
          var jurusan = $('#jurusan').val();
          var kelas = $('#kelas').val();
          var nis = $('#nis').val();
          var tunggakanspp = $('#tunggakanspp').val();
          var tunggakantotal = $('#tunggakantotal').val();
          firebase.database().ref('Akunku/' + id).set({
              UID: id,
              Nama: nama,
              Status: status,
              Alamat: alamat,
              Email: email,
              Password: password,
              TunggakanLainnya: tunggakanlainnya,
              Foto: foto,
              Jurusan: jurusan,
              Kelas: kelas,
              NIS: nis,
              TunggakanSPP: tunggakanspp,
              TunggakanTotal: tunggakantotal,
          });
          $('#update-modal').modal('hide');
                          Swal.fire(
                              'Changed Data',
                              'Data berhasil Diubah!',
                              'success'
                          )
                          
          window.location.href = "{{URL('/admin/siswa')}}"
          // toastr2["success"]("Data Berhasil Di Ubah");
      }
</script>
{{-- ------------------------------------------------------------------------- --}}

@endsection