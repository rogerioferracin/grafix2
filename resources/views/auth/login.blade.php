<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL::asset('img/favicon.ico') }}">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--Plugins css-->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">



    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <div id="page-login" class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="box">
                {{--Form--}}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                    <div class="box-content clearfix">
                        <div class="text-center">
                            <div class="center-block">
                                <img src="{!! URL::asset('img/grafix-logo-capa.png') !!}" alt="Logo grafix" class="img-responsive center-block">
                            </div>
                            <h3 class="page-header">Grafix Login Page</h3>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Opa!</strong> ocorreram algun erros com suas informações.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-offset-2 col-md-8 clearfix">
                            <div class="form-group">
                                <label class="control-label">Username</label>
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-8 ">
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control" name="password" />
                            </div>
                        </div>
                    </div>
                    <div class="box-content">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        <div class="text-center">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>