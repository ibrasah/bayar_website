<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <strong>Add User</strong>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form id="addUser" class="" method="POST" action="">
                                <div class="form-group">
                                    <label for="first_name" class="col-md-12 col-form-label">First Name</label>

                                    <div class="col-md-12">
                                        <input id="first_name" type="text" class="form-control" name="Nama" value="" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="col-md-12 col-form-label">Last Name</label>

                                    <div class="col-md-12">
                                        <input id="last_name" type="text" class="form-control" name="Status" value="" required autofocus>
                                    </div>
                                </div>
                                {!!csrf_field()!!}
                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary btn-block desabled" id="submitUser">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">
                                    <strong>All Users Listing</strong>
                                </div>
                            </div>
                        </div>
                        @foreach ($all_akun as $item)
                            
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>{{$item['Nama']}}</th>
                                    <th>{{$item['Status']}}</th>
                                    <th width="180" class="text-center">Action</th>
                                </tr>
                                <tbody id="tbody">
                                    
                                </tbody>	
                            </table>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>