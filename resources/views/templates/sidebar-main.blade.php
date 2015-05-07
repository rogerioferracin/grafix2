<div class="panel list-group nav-sidebar hidden-print">
    <a href="{!! url('/') !!}" class="list-group-item">
        <i class="fa fa-home"></i> <span>Home</span>
    </a>
    <!--MENU COMERCIAL-->
    <a href="#" class="list-group-item" data-toggle="collapse" data-target="#comercial" data-parent="#sidemenu">
        <i class="fa fa-fax"></i> <span>Comercial</span> <i class="fa fa-caret-down pull-right"></i>
    </a>
    <div id="comercial" class="collapse submenu">
        <a href="#" class="list-group-item" data-toggle="collapse" data-target="#orcamento" data-parent="#comercial">
            <i class="fa fa-money"></i>
            Orçamento
        </a>
        <div class="collapse submenu" id="orcamento">
            <a href="{!! URL::to('orcamentos') !!}" class="list-group-item">Lista todos</a>
            <a href="{!! URL::to('orcamentos/novo') !!}" class="list-group-item">Nova solicitação</a>
        </div>
    </div>
    <!--MENU FINANCEIRO-->
    <a href="#" class="list-group-item" data-toggle="collapse" data-target="#financeiro" data-parent="#sidemenu">
        <i class="fa fa-dollar"></i> <span>Financeiro</span> <i class="fa fa-caret-down pull-right"></i>
    </a>
    <div id="financeiro" class="collapse submenu">
        <a href="#" class="list-group-item" data-toggle="collapse" data-target="#duplicatas" data-parent="#financeiro">
            <i class="fa fa-money"></i>
            Duplicatas
        </a>
        <div class="collapse submenu" id="duplicatas">
            <a href="#" class="list-group-item">Lista todos</a>
            <a href="#" class="list-group-item">Novo</a>
        </div>
    </div>
    <!--MENU CADASTROS-->
    <a href="#" class="list-group-item" data-toggle="collapse" data-target="#cadastros" data-parent="#sidemenu">
        <i class="fa fa-bars"></i> <span>Cadastros</span> <i class="fa fa-caret-down pull-right"></i>
    </a>
    <div id="cadastros" class="collapse submenu">
        <div class="panel list-group">
            {{--Clientes--}}
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#clientes" data-parent="#cadastros">
                <i class="fa fa-suitcase"></i>
                Clientes
            </a>
            <div class="collapse submenu" id="clientes">
                <a href="{!! URL::to('clientes') !!}" class="list-group-item">Lista todos</a>
                <a href="{!! URL::to('clientes/novo') !!}" class="list-group-item">Novo</a>
            </div>
            {{--Financeiras--}}
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#financeiras" data-parent="#cadastros">
                <i class="fa fa-building"></i>
                Financeiras/Bancos
            </a>
            <div class="collapse submenu" id="financeiras">
                <a href="{!! URL::to('financeiras') !!}" class="list-group-item">Lista todos</a>
                <a href="{!! URL::to('financeiras/novo') !!}" class="list-group-item">Novo</a>
            </div>
            {{--Usuarios--}}
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#usuarios" data-parent="#cadastros">
                <i class="fa fa-users"></i>
                Usuários
            </a>
            <div class="collapse submenu" id="usuarios">
                <a href="{!! URL::to('usuarios') !!}" class="list-group-item">Lista todos</a>
                <a href="{!! URL::to('usuarios/novo') !!}" class="list-group-item">Novo</a>
            </div>
            {{--Matéria prima--}}
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#materia-prima" data-parent="#cadastros">
                <i class="fa fa-cubes"></i>
                Matéria-prima
            </a>
            <div class="collapse submenu" id="materia-prima">
                <a href="{!! URL::to('papeis') !!}" class="list-group-item">Papel</a>
                <a href="{!! URL::to('tintas') !!}" class="list-group-item">Tinta</a>
                <a href="{!! URL::to('acabamentos') !!}" class="list-group-item">Acabamento</a>
            </div>
        </div>
    </div>
</div>