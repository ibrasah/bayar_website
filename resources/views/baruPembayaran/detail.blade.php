@extends('layouts.masteradmin2')
@section('content')

<section class="content-header">
    <h1>
        Data Siswa
        <small>Data Pribadi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL('/admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{URL('/admin/pembayaran')}}"><i class="fa fa-dashboard"></i>Pembayaran Siswa</a></li>
        <li class="active">Detail</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="row panel panel-success" style="margin:1%;margin-top:1px;">
                <div class="panel-heading lead">
                    <div class="row">
                        <div class="col-lg-8 col-md-8"><i class="fa fa-users"></i> BUKTI PEMBAYARAN</div>
                    <input type="text" id="uidKey" value="{{$uid}}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <ul class="nav nav-tabs" id="myTab">
                                        <li class="active"><a class="nav-item nav-link" href="#2019" data-toggle="tab">2019</a>
                                        </li>
                                        <li><a href="#2020" class="nav-item nav-link" data-toggle="tab">2020</a></li>
                                        <li><a href="#2021" class="nav-item nav-link" data-toggle="tab">2021</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade in active" id="2019">
                                            <table class="table">
                                                <tbody>
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th width="20%"><center>BULAN</center></th>
                                                            <th width="20%"><center>Status Pembayaran</center></th>
                                                            <th width="35%"><center>Bukti Pembayaran</center></th>
                                                            <th width="35%"><center>Action</center></th>
                                                        </tr>
                                                    </thead>
                                                        @foreach ($data_profile as $key=>$data)
                                                            @if ($key == 0)
                                                                @foreach ($data as $key=>$date)
                                                                    <tr>
                                                                        <center>
                                                                        @if ($key == '1Januari')
                                                                                <td><i class="fa fa-book"></i> Januari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '2Februari') 
                                                                                <td><i class="fa fa-book"></i> Februari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '3Maret') 
                                                                                <td><i class="fa fa-book"></i> Maret</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '4April') 
                                                                                <td><i class="fa fa-book"></i> April</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '5Mei') 
                                                                                <td><i class="fa fa-book"></i> Mei</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '6Juni') 
                                                                                <td><i class="fa fa-book"></i> Juni</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '7Juli') 
                                                                                <td><i class="fa fa-book"></i> Juli</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '8Agustus') 
                                                                                <td><i class="fa fa-book"></i> Agustus</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '90September') 
                                                                                <td><i class="fa fa-book"></i> September</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '91Oktober') 
                                                                                <td><i class="fa fa-book"></i> Oktober</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '92November') 
                                                                                <td><i class="fa fa-book"></i> November</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '93Desember') 
                                                                                <td><i class="fa fa-book"></i> Desember</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                        @endif
                                                                        </center>
                                                                        
                                                                        @if ($date['status'] == 'B')
                                                                                <td><center>Belum Bayar</center></td>
                                                                            @elseif ($date['status'] == 'M')
                                                                                <td><center>Menunggu Konfirmasi</center></td>
                                                                            @elseif ($date['status'] == 'S') 
                                                                                <td><center>LUNAS</center></td>
                                                                        @endif
                                                                        <td>
                                                                            <img id="myImg" src="{{$date['bukti']}}" style="widht:30px;height:30px;margin-left:45%;">
                                                                            <input type="hidden" id="gambar_{{$key}}" value="{{$date['bukti']}}" >
                                                                            <div id="gambarBukti{{$key}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">accordion-groupbtn-link
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <img src="{{$date['bukti']}}" class="img-responsive">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-md-3">
                                                                                    <button type="button" class="btn btn-primary btn-sm btn-default" data-target="#gambarBukti{{$key}}" data-toggle="modal"><i class="fa fa-search-plus"></i></button>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" id="status_{{$key}}" onchange="datass('{{$key}}')">
                                                                                    <option value="B" <?php if($date['status'] == "B") echo "selected " ?>>Belum Bayar</option>
                                                                                    <option value="M" <?php if($date['status'] == "M") echo "selected " ?>>Menunggu Konfirmasi</option>
                                                                                    <option value="S" <?php if($date['status'] == "S") echo "selected " ?>>Lunas</option> 
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="2020">
                                            <table class="table">
                                                <tbody>
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th width="20%"><center>BULAN</center></th>
                                                            <th width="20%"><center>Status Pembayaran</center></th>
                                                            <th width="35%"><center>Bukti Pembayaran</center></th>
                                                            <th width="35%"><center>Action</center></th>
                                                        </tr>
                                                    </thead>
                                                        @foreach ($data_profile as $key=>$data)
                                                            @if ($key == 1)
                                                                @foreach ($data as $key=>$date)
                                                                    <tr>
                                                                        <center>
                                                                        @if ($key == '1Januari')
                                                                                <td><i class="fa fa-book"></i> Januari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '2Februari') 
                                                                                <td><i class="fa fa-book"></i> Februari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '3Maret') 
                                                                                <td><i class="fa fa-book"></i> Maret</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '4April') 
                                                                                <td><i class="fa fa-book"></i> April</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '5Mei') 
                                                                                <td><i class="fa fa-book"></i> Mei</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '6Juni') 
                                                                                <td><i class="fa fa-book"></i> Juni</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '7Juli') 
                                                                                <td><i class="fa fa-book"></i> Juli</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '8Agustus') 
                                                                                <td><i class="fa fa-book"></i> Agustus</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '90September') 
                                                                                <td><i class="fa fa-book"></i> September</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '91Oktober') 
                                                                                <td><i class="fa fa-book"></i> Oktober</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '92November') 
                                                                                <td><i class="fa fa-book"></i> November</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '93Desember') 
                                                                                <td><i class="fa fa-book"></i> Desember</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                        @endif
                                                                        </center>
                                                                        
                                                                        @if ($date['status'] == 'B')
                                                                                <td><center>Belum Bayar</center></td>
                                                                            @elseif ($date['status'] == 'M')
                                                                                <td><center>Menunggu Konfirmasi</center></td>
                                                                            @elseif ($date['status'] == 'S') 
                                                                                <td><center>LUNAS</center></td>
                                                                        @endif
                                                                        <td>
                                                                            <img id="myImg" src="{{$date['bukti']}}" style="widht:30px;height:30px;margin-left:45%;">
                                                                            <input type="hidden" id="gambar_{{$key}}" value="{{$date['bukti']}}" >
                                                                            <div id="gambarBukti{{$key}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">accordion-groupbtn-link
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <img src="{{$date['bukti']}}" class="img-responsive">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-md-3">
                                                                                    <button type="button" class="btn btn-primary btn-sm btn-default" data-target="#gambarBukti{{$key}}" data-toggle="modal"><i class="fa fa-search-plus"></i></button>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" id="status_{{$key}}" onchange="datass('{{$key}}')">
                                                                                    <option value="B" <?php if($date['status'] == "B") echo "selected " ?>>Belum Bayar</option>
                                                                                    <option value="M" <?php if($date['status'] == "M") echo "selected " ?>>Menunggu Konfirmasi</option>
                                                                                    <option value="S" <?php if($date['status'] == "S") echo "selected " ?>>Lunas</option> 
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="2021">
                                            <table class="table">
                                                <tbody>
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th width="20%"><center>BULAN</center></th>
                                                            <th width="20%"><center>Status Pembayaran</center></th>
                                                            <th width="35%"><center>Bukti Pembayaran</center></th>
                                                            <th width="35%"><center>Action</center></th>
                                                        </tr>
                                                    </thead>
                                                        @foreach ($data_profile as $key=>$data)
                                                            @if ($key == 2)
                                                                @foreach ($data as $key=>$date)
                                                                    <tr>
                                                                        <center>
                                                                        @if ($key == '1Januari')
                                                                                <td><i class="fa fa-book"></i> Januari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '2Februari') 
                                                                                <td><i class="fa fa-book"></i> Februari</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '3Maret') 
                                                                                <td><i class="fa fa-book"></i> Maret</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '4April') 
                                                                                <td><i class="fa fa-book"></i> April</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '5Mei') 
                                                                                <td><i class="fa fa-book"></i> Mei</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '6Juni') 
                                                                                <td><i class="fa fa-book"></i> Juni</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '7Juli') 
                                                                                <td><i class="fa fa-book"></i> Juli</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '8Agustus') 
                                                                                <td><i class="fa fa-book"></i> Agustus</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '90September') 
                                                                                <td><i class="fa fa-book"></i> September</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif ($key == '91Oktober') 
                                                                                <td><i class="fa fa-book"></i> Oktober</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '92November') 
                                                                                <td><i class="fa fa-book"></i> November</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                            @elseif($key == '93Desember') 
                                                                                <td><i class="fa fa-book"></i> Desember</td>
                                                                                <input value="{{$key}}" class="bulan">
                                                                        @endif
                                                                        </center>
                                                                        
                                                                        @if ($date['status'] == 'B')
                                                                                <td><center>Belum Bayar</center></td>
                                                                            @elseif ($date['status'] == 'M')
                                                                                <td><center>Menunggu Konfirmasi</center></td>
                                                                            @elseif ($date['status'] == 'S') 
                                                                                <td><center>LUNAS</center></td>
                                                                        @endif
                                                                        <td>
                                                                            <img id="myImg" src="{{$date['bukti']}}" style="widht:30px;height:30px;margin-left:45%;">
                                                                            <input type="hidden" id="gambar_{{$key}}" value="{{$date['bukti']}}" >
                                                                            <div id="gambarBukti{{$key}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog">accordion-groupbtn-link
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-body">
                                                                                            <img src="{{$date['bukti']}}" class="img-responsive">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="col-md-3">
                                                                                    <button type="button" class="btn btn-primary btn-sm btn-default" data-target="#gambarBukti{{$key}}" data-toggle="modal"><i class="fa fa-search-plus"></i></button>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" id="status_{{$key}}" onchange="datass('{{$key}}')">
                                                                                    <option value="B" <?php if($date['status'] == "B") echo "selected " ?>>Belum Bayar</option>
                                                                                    <option value="M" <?php if($date['status'] == "M") echo "selected " ?>>Menunggu Konfirmasi</option>
                                                                                    <option value="S" <?php if($date['status'] == "S") echo "selected " ?>>Lunas</option> 
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            
                                                                        </td>
                                                                        
                                                                    </tr>
                                                                @endforeach
                                                            @endif
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
            </div>
        </div>
        <div class="col-md-3">
            <div class="row panel panel-success" style="margin:1%;">
                <div class="panel-heading lead">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">Info Admin</div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <center><h4>Cara Kerja :</h4></center>
                        <div class="row">
                                <div>
                                    <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                    <div class="col-md-10"><div> Klik tombol biru untuk mengecek Bukti Tranfer Siswa</div></div>
                                </div>
                                <div>
                                    <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                    <div class="col-md-10"><div> Pastikan penerima Tranfer tersebut adalah Rekening Sekolah (Rek.2019290002) </div></div>
                                </div>
                                <div>
                                    <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                    <div class="col-md-10"><div> Ubah status menjadi <i>Lunas</i></div></div>
                                </div>
                                <div>
                                    <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                    <div class="col-md-10"><div> Update data Total Tunggakan siswa di tombol Bawah Ini !!</div></div>
                                </div>
                                <br><br>
                                <button style="margin-top:7px;" data-toggle="modal" type="button" onclick="update('{{$data_profilku[12]}}')" class="btn btn-primary btn-sm btn-default col-md-12"> Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
{{-- MODAL UPDATE --}}
<form action="" method="POST" class="users-update-record-model form-horizontal">
    <div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:40%;">
            <div class="modal-content" style="overflow: hidden;">
                <div class="modal-header">
                    <h4 class="modal-title" id="custom-width-modalLabel">Update Record</h4>
                    <button type="button" class="close update-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body" id="updateBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect update-data-from-delete-form" data-dismiss="modal" onclick="updateUserRecord()">Close</button>
                    <button type="button" class="btn btn-success waves-effect waves-light" onclick="updateUserRecord()">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- DATA TABLE --}}
<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
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
<script>
    $('#myTab a').click(function (e) {
        if($(this).parent('li').hasClass('active')){
            $( $(this).attr('href') ).hide();
        }
        else {
            e.preventDefault();
            $(this).tab('show');
        }
    });

    $(document).ready(function(){
        $('.bulan').hide();
        $('#uidKey').hide();
    })
    function datass(bulan){
            var status = $("#status_"+bulan).val();
            var uid = $('#uidKey').val();
            var gambar = $('#gambar_'+bulan).val();
            // console.log(status);
            // console.log(bulan);
            // console.log(gambar);
            firebase.database().ref('SPP/' + uid +'/'+'2019/'+ bulan).set({
                bukti: gambar,
                status: status
            });
            location.reload();
        }
</script>
<script>
    function updateStatus(){
        var status = $('#status').val();
        firebase.database().ref('SPP/'+$data_profile+$key+$date).set({
            Status: status,
        });
        $('#update-modal').modal('hide');
                        Swal.fire(
                            'Changed Data',
                            'Data berhasil Diubah!',
                            'success'
                        )
                        
        location.reload();
        // toastr2["success"]("Data Berhasil Di Ubah");
    }
</script>
<script>
function update(uid){
	firebase.database().ref('Akunku/' + uid).on('value', function(snapshot) {
		var values = snapshot.val();
		var updateData = 
        '<div class="col-md-12">\
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
            <div class="form-group" >\
		        <label for="first_name" class="col-md-12 col-form-label">Tunggakan Lainnya</label>\
		        <div class="col-md-12">\
		            <input id="tunggakanlainnya" type="text" class="form-control" name="first_name" value="'+values.TunggakanLainnya+'" required autofocus>\
		        </div>\
            </div>\
            <div id="div_hide">\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="alamat" type="hidden" class="form-control" name="last_name" value="'+values.Alamat+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="email" type="hidden" class="form-control" name="first_name" value="'+values.Email+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="password" type="hidden" class="form-control" name="last_name" value="'+values.Password+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="uid" type="hidden" value="'+values.UID+'">\
                        <input id="status" type="hidden" value="'+values.Status+'">\
                        <input id="nama" type="hidden" class="form-control" name="first_name" value="'+values.Nama+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <label for="first_name" class="col-md-12 col-form-label" type="hidden"></label>\
                    <div class="col-md-12" type="hidden">\
                        <img id="foto" height="100" width="100" src="'+values.Foto+'" type="hidden">\
                    </div>\
                </div>\
                \
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="jurusan" type="hidden" class="form-control" name="first_name" value="'+values.Jurusan+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="kelas" type="hidden" class="form-control" name="last_name" value="'+values.Kelas+'" required autofocus>\
                    </div>\
                </div>\
                <div class="form-group" type="hidden">\
                    <div class="col-md-12" type="hidden">\
                        <input id="nis" type="hidden" class="form-control" name="first_name" value="'+values.NIS+'" required autofocus>\
                    </div>\
                </div>\
            </div>\
        </div>';
            console.log(updateData);
		    $('#updateBody').html(updateData);
            // alert('asf')
            $('#update-modal').modal('show');
            $('#div_hide').hide();
           
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
                    
    location.reload();
    // toastr2["success"]("Data Berhasil Di Ubah");
}
</script>
{{-- --------------------------------------------------------------------------------------------------------- --}}

@endsection