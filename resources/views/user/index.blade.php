@extends('layouts.masteruser')
@section('content')
    

<!-- Content Header (Page header) -->
    <section class="content-header">
        <section class="col-lg-5 connectedSortable ui-sortable">

            <!-- Map box -->
            <div class="box box-solid bg-light-blue-gradient">
              <div class="box-header ui-sortable-handle" style="cursor: move;">
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="" data-original-title="Date range">
                    <i class="fa fa-calendar"></i></button>
                  <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->
                <i class="fa fa-map-marker"></i>
                <h3 class="box-title">
                  Visitors
                </h3>
              </div>
              <div class="box-body">
              <!-- /.box-body-->
              <div class="box-footer no-border">
                <div class="row">
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-1"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                    <div class="knob-label">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-2"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                    <div class="knob-label">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center">
                    <div id="sparkline-3"><canvas width="80" height="50" style="display: inline-block; width: 80px; height: 50px; vertical-align: top;"></canvas></div>
                    <div class="knob-label">Exists</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.box -->
          </section>
          <div class="container-login100-form-btn m-t-32">
              <button id="form-submit" onclick="logout()" class="login100-form-btn">
                Logout
              </button>
            </div>
    </section>
  <!-- /.content -->
  @endsection
  <!------------------------------------------------------------------------------->
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
        function logout(){
          firebase.auth().signOut();
        }
    </script>
      