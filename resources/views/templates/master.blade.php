
<!DOCTYPE html>
<html lang="pt-br" ng-app="grafixApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Rogerio Ferracin">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ URL::asset('img/favicon.ico') }}">

    <title>Grafix {!! isset($className) ? ' - ' . $className : '' !!}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--Plugins css-->
    <link href="{{ URL::asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/bsdatetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/select2/select2.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/select2/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('/plugins/angular/dialog/dialogs.min.css') }}" rel="stylesheet">




    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Muli:300,400,300italic,400italic' rel='stylesheet' type='text/css'>

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- NAVBAR -------------------------------------------------------------------------------------------------------- -->
<nav class="navbar">
    @include('templates.navbar')
</nav>

<div class="container-fluid" id="content">
    <div class="row">
        <!-- SIDEBAR ----------------------------------------------------------------------------------------------- -->
        <div class="col-sm-3 col-md-2 sidebar no-print">
            <div id="sidemenu">
                @include('templates.sidebar-main')
            </div>
        </div>
        <!-- BREADCRUMB -------------------------------------------------------------------------------------------- -->
        <div class="col-lg-10 col-md-offset-2 no-print">
            <div id="breadcrumb" class="row">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                </ol>
            </div>
        </div>


        <!-- DASHBOARD --------------------------------------------------------------------------------------------- -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">
                {{ isset($className) ? $className : 'Grafix' }}
            </h1>

            <div class="row" id="info-panel">
                <div class="col-md-12">
                    <span class="sub-header">{{ isset($page_title) ? $page_title : 'Sistema de gerenciamento gráfico' }}</span>
                </div>
            </div>
            <div class="row">
                <div id="dashboard_links" class="col-md-2 pull-right no-print">
                    @yield('sidebar')
                    <hr>
                    @include('flash::message')
                    @if($errors->has())
                        <div id="erros" data-alert class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach($errors->all() as $erro)
                                    <li class="small">{!! $erro !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div id="dashboard_tabs" class="col-md-10 print">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END DASHBOARD -->
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->

<script src="{{ URL::asset('/plugins/angular/angular.min.js') }}"></script>
<script src="{{ URL::asset('/plugins/angular/angular-sanitize.min.js') }}"></script>
<script src="{{ URL::asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jquery-mask/jquery.maskedinput.min.js') }}"></script>
<script src="{{ URL::asset('plugins/jquery-mask/jquery.maskMoney.js') }}"></script>
<script src="{{ URL::asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ URL::asset('/plugins/angular/ui/ui-bootstrap-tpls-0.12.1.min.js') }}"></script>
<script src="{{ URL::asset('/plugins/angular/dialog/dialogs.min.js') }}"></script>
<script src="{{ URL::asset('/plugins/angular/dialog/dialogs-default-translations.min.js') }}"></script>
{!! Toastr::render() !!}

<!--Load js for page-->
<script src="{{ URL::asset('js/dashboard.js') }}"></script>
<script src="{{ URL::asset('js/controllers/controllers.js') }}"></script>

<script>

</script>

@yield('scripts')

</body>
</html>
