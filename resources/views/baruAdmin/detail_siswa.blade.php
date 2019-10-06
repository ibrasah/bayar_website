
@extends('layoutbaru.masterdua')
@section('contentdua')
<div class="content">
        <div class="row panel panel-success" style="margin:1%;">
            <div class="panel-heading lead">
                <div class="row">
                    {{-- <div class="col-lg-8 col-md-8"><i class="fa fa-users"></i> View Student Details</div> --}}
                    <div class="col-lg-4 col-md-4 text-right">
                        {{-- @foreach ($all_akun as $item)   --}}
                            <div class="btn-group text-center">
                                <a href="" data-toggle="modal" onclick="update('{{$data_profile[12]}}')" class="btn btn-success btn-sm btn-default"><i class="fa fa-edit fa-1x"></i></a>
                            </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <center>
                                    <span class="text-left">
                                        <img src="{{$data_profile[2]}}" class="img-responsive img-thumbnail">
                                        <!-- Modal -->
                                        <div class="modal fade" id="PhotoOption" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:30%;height:30%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">×</button>
                                                        <h4 class="modal-title text-success" id="myModalLabel"><i
                                                                class="fa fa-gear"></i> <span class="text-right">Viddhyut
                                                                Mall</span></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="upload/upload-view.php?id=68" class="btn btn-success"><i
                                                                class="fa fa-photo"></i> Upload</a>
                                                        <a href="upload/upload-view.php?id=68&amp;name=Viddhyut Mall&amp;src=view"
                                                            class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    </span></center>
    
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <ul class="nav nav-tabs" id="myTab">
                                    <li class="active"><a class="nav-item nav-link" href="#Summery" data-toggle="tab">Informasi</a></li>
                                    <li><a href="#Spp" class="nav-item nav-link" data-toggle="tab">Tunggakan SPP</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane" id="Summery">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-success" width="25%"><i class="fa fa-user"></i> Nama
                                                        Lengkap</td>
                                                    <td width="75%">{{$data_profile[6]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-id-card-o"></i> NIS </td>
                                                    <td>{{$data_profile[5]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-home"></i> Alamat </td>
                                                    <td>{{$data_profile[0]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-university"></i> Kelas
                                                    </td>
                                                    <td>{{$data_profile[4]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-group"></i> Jurusan</td>
                                                    <td>{{$data_profile[3]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-envelope-open"></i> Email
                                                    </td>
                                                    <td>{{$data_profile[1]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-key"></i> Password
                                                    </td>
                                                    <td>{{$data_profile[7]}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="Spp">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="text-success" width="25%"><i class="fa fa-book"></i> Tunggakan Lainnya</td>
                                                    <td width="75%">{{$data_profile[9]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-book"></i> Tunggakan Total </td>
                                                    <td>{{$data_profile[11]}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-success"><i class="fa fa-book"></i> Tunggakan SPP</td>
                                                    <td>{{$data_profile[10]}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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