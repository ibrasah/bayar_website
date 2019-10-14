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
        <li class="active">Detail</li>
    </ol>
</section>
<div class="content">
    <div class="row">
        {{-- <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Data Siswa</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="addUser" class="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name" class="col-md-12 col-form-label">Nama Lengkap</label>
                                <div class="col-md-12">
                                    <input id="Nama" type="text" class="form-control" name="Nama" value="" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-md-12 col-form-label">NIS</label>
                                <div class="col-md-12">
                                    <input id="NIS" type="text" class="form-control" name="NIS" value="" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name" class="col-md-12 col-form-label">Kelas</label>
                                <div class="col-md-12">
                                    <input id="Kelas" type="text" class="form-control" name="Kelas" value="" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-12 col-form-label">Password</label>
                                <div class="col-md-12">
                                    <input id="Password" type="password" class="form-control" name="Password" value=""
                                        required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat" class="col-md-12 col-form-label">Alamat</label>
                                <div class="col-md-12">
                                    <input id="Alamat" type="text-area" class="form-control" name="Alamat" value=""
                                        required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-12 col-form-label">Email</label>
                                <div class="col-md-12">
                                    <input id="Email" type="email" class="form-control" name="Email" value="" required
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan" class="col-md-12 col-form-label">Jurusan</label>
                                <div class="col-md-12">
                                    <input id="Jurusan" type="text" class="form-control" name="Jurusan" value=""
                                        required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="col-md-12 col-form-label">Input Foto Siswa</label>
                                <div class="col-md-12">
                                    <input type="file" id="Foto" onchange="previewFile()" class="form-control"
                                        name="Foto">
                                </div>
                            </div>
                            <div hidden>
                                <div class="form-group">
                                    <label for="status" class="col-md-12 col-form-label">Status</label>
                                    <div class="col-md-12">
                                        <input id="Status" type="text" class="form-control" name="Status" value="Siswa">
                                    </div>
                                </div>
                            </div>
                            <div hidden>
                                <div class="form-group">
                                    <label for="TunggakanLainnya" class="col-md-12 col-form-label">Tunggakan
                                        Lainnya</label>
                                    <div class="col-md-12">
                                        <input id="TunggakanLainnya" type="text" class="form-control"
                                            name="TunggakanLainnya" value="0">
                                    </div>
                                </div>
                            </div>
                            <div hidden>
                                <div class="form-group">
                                    <label for="TunggakanSPP" class="col-md-12 col-form-label">Tunggakan SPP</label>
                                    <div class="col-md-12">
                                        <input id="TunggakanSPP" type="text" class="form-control" name="TunggakanSPP"
                                            value="4.800.000">
                                    </div>
                                </div>
                            </div>
                            <div hidden>
                                <div class="form-group">
                                    <label for="TunggakanTotal" class="col-md-12 col-form-label">Tunggakan Total</label>
                                    <div class="col-md-12">
                                        <input id="TunggakanTotal" type="text" class="form-control"
                                            name="TunggakanTotal" value="4.800.000">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 pull-right" style="margin-top:10px;">
                                    <button onclick="add()" class="btn btn-primary btn-block desabled" id="submitUser">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                        {!!csrf_field()!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Info</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div id="Admin" class="">
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div>
                                        <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="col-md-10">
                                            <div> Klik tombol biru untuk mengecek Bukti Tranfer Siswa</div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="col-md-10">
                                            <div> Pastikan penerima Tranfer tersebut adalah Rekening Sekolah
                                                (Rek.2019290002) </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="col-md-10">
                                            <div> Ubah status menjadi <i>Lunas</i></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-md-2"><i class="fa fa-newspaper-o"></i></div>
                                        <div class="col-md-10">
                                            <div> Update data Total Tunggakan siswa di tombol Bawah Ini !!</div>
                                        </div>
                                    </div>
                                    <br><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-9">
            <div class="row panel panel-success" style="margin:1%;margin-top:1px;">
                <div class="panel-heading lead">
                    <div class="row">
                        <div class="col-lg-8 col-md-8"><i class="fa fa-users"></i> BUKTI PEMBAYARAN</div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div id="addUser" class="">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name" class="col-md-12 col-form-label">Nama
                                                    Lengkap</label>
                                                <div class="col-md-12">
                                                    <input id="Nama" type="text" class="form-control" name="Nama"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name" class="col-md-12 col-form-label">NIS</label>
                                                <div class="col-md-12">
                                                    <input id="NIS" type="text" class="form-control" name="NIS" value=""
                                                        required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="last_name" class="col-md-12 col-form-label">Kelas</label>
                                                <div class="col-md-12">
                                                    <input id="Kelas" type="text" class="form-control" name="Kelas"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="col-md-12 col-form-label">Password</label>
                                                <div class="col-md-12">
                                                    <input id="Password" type="password" class="form-control"
                                                        name="Password" value="" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat" class="col-md-12 col-form-label">Alamat</label>
                                                <div class="col-md-12">
                                                    <input id="Alamat" type="text-area" class="form-control"
                                                        name="Alamat" value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="col-md-12 col-form-label">Email</label>
                                                <div class="col-md-12">
                                                    <input id="Email" type="email" class="form-control" name="Email"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan" class="col-md-12 col-form-label">Jurusan</label>
                                                <div class="col-md-12">
                                                    <input id="Jurusan" type="text" class="form-control" name="Jurusan"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="foto" class="col-md-12 col-form-label">Input Foto
                                                    Siswa</label>
                                                <div class="col-md-12">
                                                    <input type="file" id="Foto" onchange="previewFile()"
                                                        class="form-control" name="Foto">
                                                </div>
                                            </div>
                                            <div hidden>
                                                <div class="form-group">
                                                    <label for="status" class="col-md-12 col-form-label">Status</label>
                                                    <div class="col-md-12">
                                                        <input id="Status" type="text" class="form-control"
                                                            name="Status" value="Siswa">
                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden>
                                                <div class="form-group">
                                                    <label for="TunggakanLainnya"
                                                        class="col-md-12 col-form-label">Tunggakan
                                                        Lainnya</label>
                                                    <div class="col-md-12">
                                                        <input id="TunggakanLainnya" type="text" class="form-control"
                                                            name="TunggakanLainnya" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden>
                                                <div class="form-group">
                                                    <label for="TunggakanSPP" class="col-md-12 col-form-label">Tunggakan
                                                        SPP</label>
                                                    <div class="col-md-12">
                                                        <input id="TunggakanSPP" type="text" class="form-control"
                                                            name="TunggakanSPP" value="4.800.000">
                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden>
                                                <div class="form-group">
                                                    <label for="TunggakanTotal"
                                                        class="col-md-12 col-form-label">Tunggakan Total</label>
                                                    <div class="col-md-12">
                                                        <input id="TunggakanTotal" type="text" class="form-control"
                                                            name="TunggakanTotal" value="4.800.000">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12 pull-right" style="margin-top:10px;">
                                                    <button onclick="add()" class="btn btn-primary btn-block desabled"
                                                        id="submitUser">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        {!!csrf_field()!!}
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
                        <center>
                            <h4></h4>
                        </center>
                        <div class="row">
                            <div>
                                <div class="col-md-2"><i class="fa fa-newspaper-o" style="margin-top:10px;"></i></div>
                                <div class="col-md-10">
                                    <div> Isi NIS yang berbeda pada tiap murid</div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-2"><i class="fa fa-newspaper-o" style="margin-top:10px;"></i></div>
                                <div class="col-md-10">
                                    <div> Isi password lebih dari 6 <i>(akun123)</i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-2"><i class="fa fa-newspaper-o" style="margin-top:10px;"></i></div>
                                <div class="col-md-10">
                                    <div>  Input <b>Foto</b> Siswa berbentuk file <i>.jpeg</i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('adminlte/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" charset="utf8"
    src="{{asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
{{-- ------------------------------------------------------------------------- --}}
<!------------------------------------------------------------------------------->
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
    firebase.auth().onAuthStateChanged(function(user) {
        if(user){
            
        }else{
          window.location.href = "{{url('/login')}}";
        }
    });

        var storageRef = firebase.storage().ref();  
        var Foto = "";

        function previewFile(){
        var uploader = document.getElementById('uploader');
        var file =document.querySelector('input[type=file]').files[0];
        var uploadTask = storageRef.child('foto_siswa/' + file.name).put(file);

        uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED,
        function(snapshot) {
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
            switch (snapshot.state) {
                case firebase.storage.TaskState.PAUSED:
                    console.log('Upload is paused');
                    break;
                case firebase.storage.TaskState.RUNNING:
                    console.log('Upload is running');
                    break;
            }
            }, function(error) {
                console.log('error while uploading')
            }, function() {
                var starsRef = storageRef.child('foto_siswa/'+ file.name);
                starsRef.getDownloadURL().then(function(url) {
                    // document.querySelector('#preview').src=url;
                    Foto = url;
                    // $('#foto_field').attr('src', url);
                });
            });
        }
        
    
    function add(){
            var email = $('#Email').val();
            var password = $('#Password').val();

            let timerInterval
				Swal.fire({
				title: 'Wait!!',
				timer: 31000,
				onBeforeOpen: () => {
					Swal.showLoading()
					timerInterval = setInterval(() => {
					Swal.getContent().querySelector('strong')
						.textContent = Swal.getTimerLeft()
					}, 100)
				},
				onClose: () => {
					clearInterval(timerInterval)
				}
				}).then((result) => {
				if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.timer
				) {
					console.log('I was closed by the timer')
				}
				})

            firebase.auth().createUserWithEmailAndPassword(email, password).then(function () {
                var uid = firebase.auth().currentUser.uid;
                $.ajax({
                    type:"post" ,
                    url:"{{URL('/admin/addsiswa')}}",
                    data:{
                        _token: "{{csrf_token()}}",
                        uid: uid,
                        Nama: $('#Nama').val(),
                        NIS: $('#NIS').val(),
                        Kelas: $('#Kelas').val(),
                        Password: $('#Password').val(),
                        Alamat: $('#Alamat').val(),
                        Email: $('#Email').val(),
                        Jurusan: $('#Jurusan').val(),
                        Foto: Foto,
                        Status: $('#Status').val(),
                        TunggakanLainnya: $('#TunggakanLainnya').val(),
                        TunggakanSPP: $('#TunggakanSPP').val(),
                        TunggakanTotal: $('#TunggakanTotal').val(),
                    },
                    success:function(response) {
                        window.location.href = "{{URL('/admin/siswa')}}"
                        Swal.fire(
                            'Add Data',
                            'Sukses tambah data!',
                            'success'
                        )
                    }
                });
            }).catch(function(error) {
                var errorCode = error.code;
                var errorMessage = error.message;
            });
    }

    function logout(){
      firebase.auth().signOut();
    //   alert()->success('You have been logged out.', 'Good bye!');
    }
</script>