@extends('layoutbaru.master')
@section('content')

<div class="content">
    @section('contentsatu')
    <div class="row">
        <div class="col-lg-4 col-xs-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Belum Bayar</h5>
                        <h1>
                            <div id="Belum">

                            </div>
                        </h1>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-nowrap">Since last month</span>
                    </p>
                  </div>
                </div>
        </div>
        <div class="col-lg-4 col-xs-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Menunggu</h5>
                        <span class="h2">
                            <div id="Menunggu">

                            </div></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-nowrap">Since last month</span>
                    </p>
                  </div>
                </div>
        </div>
        <div class="col-lg-4 col-xs-6">
                <div class="card card-stats mb-4 mb-xl-0">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Lunas</h5>
                        <span class="h2 font-weight-bold mb-0">
                            <div id="Lunas">

                            </div></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>
                    <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-nowrap">Since last month</span>
                    </p>
                  </div>
                </div>
        </div>
    </div>
    @endsection
    @section('contentdua')
    <div class="panel">
        <div id="chartNilai">

        </div>
    </div>
</div>

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
    };
    var uid = 1;
    var ref = firebase.database().ref("SPP/");
        ref.on("value", function(snapshot) {
            var B = 0
            var M = 0
            var S = 0
            snapshot.forEach(uid => {
                uid.forEach(tahun => {
                    tahun.forEach(bulan => {
                        if(bulan.val()['status'] == "B") {
                            B++
                        } else if(bulan.val()['status'] == "M") {
                            M++
                        } else if(bulan.val()['status'] == "S") {
                            S++
                        }
                    })
                });
            });
            $('#Belum').html('<h3>'+B+'</h3>');
            $('#Menunggu').html('<h3>'+M+'</h3>');
            $('#Lunas').html('<h3>'+S+'</h3>');
        });
    </script>
@endsection

@section('foot')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
// Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});
var ref = firebase.database().ref("SPP/");
        ref.on("value", function(snapshot) {
            var B = 0
            var M = 0
            var S = 0
            snapshot.forEach(uid => {
                uid.forEach(tahun => {
                    tahun.forEach(bulan => {
                        if(bulan.val()['status'] == "B") {
                            B++
                        } else if(bulan.val()['status'] == "M") {
                            M++
                        } else if(bulan.val()['status'] == "S") {
                            S++
                        }
                    })
                });
            });
            $('#Belum').html('<h3>'+B+'</h3>');
            $('#Menunggu').html('<h3>'+M+'</h3>');
            $('#Lunas').html('<h3>'+S+'</h3>');
            Highcharts.chart('chartNilai', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'GRAFIK'
    },
    subtitle: {
        text: 'Status Pembayaran SPP Siswa'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Share',
        data: [
            { name: 'Belum Bayar', y: B },
            { name: 'Menunggu Konfirmasi', y: M },
            { name: 'Lunas', y: S }
        ]
    }]
    // ,
    // colors: ['#fffwww', '#qweasd', '#123123']
});
        });
// Build the chart
</script>
@endsection