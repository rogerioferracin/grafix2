<div class="modal-header clearfix">
    <span class="h4 modal-title pull-left">Contato</span>
    <span class="pull-right" ng-show="loading">
        <i class="fa fa-spin fa-refresh"></i>
    </span>
    <span class="pull-right" ng-show="load_check">
        <i class="fa fa-check"></i>
    </span>
</div>
<div class="modal-body">
    <div class="panel panel-warning" ng-show="panel_error">
        <div class="panel-body">
            <ul>
                <li ng-repeat="(key, value) in errors">
                    <span ng-bind-html="value" class="small"></span>
                </li>
            </ul>
        </div>
    </div>
    <div class="form-horizontal">
        @include('contatos.partials._contato_form')
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" ng-click="cancel()">Cancelar</button>
    <button ng-show="btn_grava" class="btn btn-primary" ng-click="grava()" confirma-envio="click">Grava</button>
    <button ng-show="btn_atualiza" class="btn btn-primary" ng-click="atualiza()" confirma-envio="click">Atualiza</button>
</div>