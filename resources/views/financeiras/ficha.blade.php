@extends('templates.master')

@section('content')

    <div role="tabpanel" ng-controller="ContatoCrtl">
        {{--NAV TABS--}}
        <ul class="nav nav-tabs">
            <li class="active"><a href="#cadastro-tab" data-toggle="tab">Cadastro</a></li>
            <li><a href="#contatos-tab" data-toggle="tab">Contatos</a></li>
            <li><a href="#trabalhos-tab" data-toggle="tab">Trabalhos</a></li>
            <li><a href="#duplicatas-tab" data-toggle="tab">Financeiro</a></li>
        </ul>

        {{--TAB PANES--}}
        <div class="tab-content">
            {{--TAB CADASTRO--}}
            <div class="tab-pane active" id="cadastro-tab">
                <div class="well well-sm box-well">
                    {{--TABELA CADASTRO--}}
                    <table class="table table-responsive">
                        <tbody>
                        <tr>
                            <td>
                                <table class="table table-bordered tabela-ficha-dados">
                                    <thead>
                                    <tr>
                                        <th>Nome:</th>
                                        <td colspan="3"><span class="h4">
                                                <a href="{!! url('financeiras/altera', ['id'=>$financeira->id]) !!}"> {!! $financeira->financeira !!}</a>
                                            </span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Razão Social:</th>
                                        <td>{!! $financeira->razao_social !!}</td>
                                        <th>Cliente desde:</th>
                                        <td>{!! $financeira->cliente_desde !!}</td>
                                    </tr>
                                    <tr>
                                        <th>CNPJ/CPF:</th>
                                        <td>{!! $financeira->cnpj_cpf !!}</td>
                                        <th>Insc. Est./RG:</th>
                                        <td>{!! $financeira->ie_rg !!}</td>
                                    </tr>
                                    <tr>
                                        <th>IM:</th>
                                        <td>{!! $financeira->im !!}</td>
                                        <th>Situação:</th>
                                        <td>{!! ($financeira->ativo) ? 'Ativo' : 'Inativo' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Observações:</th>
                                        <td colspan="3">{!! $financeira->observações !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Logradouro:</th>
                                        <td>{!! $financeira->endereco->logradouro . ', '. $financeira->endereco->numero !!}</td>
                                        <th>Complemento:</th>
                                        <td> {!! $financeira->endereco->complemento !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Bairro:</th>
                                        <td>{!! $financeira->endereco->bairro !!}</td>
                                        <th>Cidade:</th>
                                        <td> {!! $financeira->endereco->cidade !!}</td>
                                    </tr>
                                    <tr>
                                        <th>CEP:</th>
                                        <td>{!! $financeira->endereco->cep !!}</td>
                                        <th>UF:</th>
                                        <td> {!! $financeira->endereco->uf !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Referência:</th>
                                        <td colspan="3">{!! $financeira->endereco->referencia !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        {{--TABELA CONTATOS--}}
                        <tr>
                            <th class="h4">Contato Principal</th>
                        </tr>
                        <tr>
                            <td>
                                <table class="table table-bordered tabela-ficha-dados">
                                    <thead>
                                    <tr>
                                        <th>Nome:</th>
                                        <td>
                                            <a href="#" ng-click="atualizaContato({{{ $financeira->contatoPrincipal->id }}})">
                                                {!! $financeira->contatoPrincipal->nome !!} {!! $financeira->contatoPrincipal->sobrenome !!}
                                            </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Cargo:</th>
                                        <td>{!! $financeira->contatoPrincipal->cargo !!}</td>
                                        <th>Setor:</th>
                                        <td>{!! $financeira->contatoPrincipal->setor !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Telefone:</th>
                                        <td>{!! $financeira->contatoPrincipal->telefone !!}</td>
                                        <th>Celular:</th>
                                        <td>{!! $financeira->contatoPrincipal->celular !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{!! $financeira->contatoPrincipal->email !!}</td>
                                        <th>Skype:</th>
                                        <td>{!! $financeira->contatoPrincipal->skype !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Aniversário:</th>
                                        <td>{!! $financeira->contatoPrincipal->aniversario !!}</td>
                                        <th>Detalhes:</th>
                                        <td>{!! $financeira->contatoPrincipal->observacoes !!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{-- END TABLE CADASTRO --}}
                </div>
            </div>
            {{--TAB CONTATOS--}}
            <div class="tab-pane" id="contatos-tab">
                <div class="well well-sm box-well">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Cargo</th>
                                <th>Telefone</th>
                                <th>Celular</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($financeira->contatos as $contato)
                                <tr>
                                    <td>
                                        <a href="#" ng-click="atualizaContato({{{ $contato->id }}})">
                                            {!! $contato->nome !!} {!! $contato->sobrenome !!}
                                        </a>
                                    </td>
                                    <td>{!! $contato->cargo !!}</td>
                                    <td>{!! $contato->telefone !!}</td>
                                    <td>{!! $contato->celular !!}</td>
                                    <td>{!! $contato->email !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--TAB TRABALHOS--}}
            <div class="tab-pane" id="trabalhos-tab">
                <div class="well well-sm box-well">
                    Trabalhos
                </div>
            </div>
            {{--TAB FINANCEIRO--}}
            <div class="tab-pane" id="duplicatas-tab">
                <div class="well well-sm box-well">
                    Duplicatas emitidas
                </div>
            </div>
        </div>
    </div>

@stop

@section('sidebar')
    @include('financeiras.sidebar')
    <div ng-controller="ContatoCrtl">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#" class="tab-link  tab-link-title" id="overview"><span class="h4">Cliente</span></a></li>
            <li>
                <a href="#" ng-click="novoContato('Financeira', {!! $financeira->id !!})" class="tab-link" >
                    <i class="fa fa-phone"></i> Novo contato
                    <input type="hidden" ng-init="contato.business='Financeira'">
                    <input type="hidden" ng-init="contato.businessId={{{ $financeira->id }}}">
                </a>
            </li>
            <li>
                <a href="#" class="tab-link" id="btn-print-ficha">
                    <i class="fa fa-print"></i> Ficha cadastro
                </a>
            </li>
        </ul>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
        });
    </script>
@stop
