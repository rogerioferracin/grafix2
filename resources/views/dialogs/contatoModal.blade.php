<div class="modal-header clearfix">
    <span class="h4 modal-title pull-left">Contato</span>
    <span class="pull-right" ng-show="loading">
        <i class="fa fa-spin fa-spinner"></i>
    </span>
</div>
<div class="modal-body">
    <div ng-show="panel_error">
        <div  class="panel panel-warning">
            <div class="panel-body">
                <ul>
                    <li ng-repeat="(key, value) in errors">
                        <span ng-bind-html="value" class="small"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="form-horizontal">
        @include('contatos.partials._contato_form')
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-default" ng-click="cancel()">Cancelar</button>
    <button class="btn btn-primary" ng-click="ok()" confirma-envio="click">Atualiza</button>
</div>