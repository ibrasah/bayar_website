<!DOCTYPE html>
<html>
    <head>
        @php
            use RealRashid\SweetAlert\Facades\Alert;
        @endphp
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../../img/icons/favicon.ico"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminPAGE</title>
        <style>
        .popup{
            width: 900px;
            margin: auto;
            text-align: center
        }
        .popup img{
            width: 200px;
            height: 200px;
            cursor: pointer
        }
        .show{
            z-index: 999;
            display: none;
        }
        .show .overlay{
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,.66);
            position: absolute;
            top: 0;
            left: 0;
        }
        .show .img-show{
            width: 600px;
            height: 400px;
            background: #FFF;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            overflow: hidden
        }
        .img-show span{
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 99;
            cursor: pointer;
        }
        .img-show img{
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        /*End style*/

        </style>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../adminlte/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../adminlte/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../adminlte/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="/adminlte/css/skins/_all-skins.min.css">
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    
        <!-- Google Font -->
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script> --}}
    </head>
    <body>
        <div class="popup">
            <img src="https://pbs.twimg.com/media/CX1PAZwVAAANemW.jpg">
            <img src="http://images5.fanpop.com/image/photos/30900000/beautiful-pic-different-beautiful-pictures-30958249-1600-1200.jpg">
        </div>
        <div class="show">
          <div class="overlay"></div>
          <div class="img-show">
            <span>X</span>
              <img src="">
          </div>
        </div>
          <!--End image popup-->
    </body>
  </html>  
    <script src="../../adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../../adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClic/adminlte -->
    <script src="../../adminlte/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE/adminlte-->
    <script src="../../adminlte/js/adminlte.min.js"></script>
    <!-- AdminLTE/adminltedurposes -->
    <script src="../../adminlte/js/demo.js"></script>
    {{-- <script src="../../plugins/bootstrap-pager.js"></script> --}}
    <script>
        $(function () {
            "use strict";
            
            $(".popup img").click(function () {
                var $src = $(this).attr("src");
                $(".show").fadeIn();
                $(".img-show img").attr("src", $src);
            });
            
            $("span, .overlay").click(function () {
                $(".show").fadeOut();
            });
            
        });
      </script>
