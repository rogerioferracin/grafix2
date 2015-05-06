<div class="container-fluid">
    <div class="row">
        <div id="logo" class="col-xs-12 col-md-2">
            <a href="{!! URL::to('/') !!}"><img src="{!! URL::asset('img/grafix-logo-50.png') !!}"> Grafix <sup>v0.0.2</sup></a>
        </div>
        <div id="top-panel" class="col-xs-12 col-md-10">
            <div class="row">
                <div class="col-xs-4 col-sm-8 top-panel-right pull-right">
                    <ul class="nav navbar-nav pull-right panel-menu">
                        <li>
                            <a href="#">
                                <i class="fa fa-envelope"></i>
                                <span class="badge">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                <div class="avatar">
                                    <img src="{!! URL::asset('img/johndoe.png') !!}" class="img-circle">
                                </div>
                                <i class="fa fa-angle-down pull-right"></i>
                                <div class="user-mini pull-right">
                                    <span class="welcome">Bem vindo,</span>
                                    <span>{!! Auth::user()->nome !!}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{!! url('usuarios/ficha', array('id'=>Auth::user()->id)) !!}">
                                        <i class="fa fa-user"></i> <span>Perfil</span></a>
                                </li>
                                <li><a href="{!! url('auth/logout') !!}">
                                        <i class="fa fa-power-off"></i> <span>Logout</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>