@extends('templates.master')

@section('content')

    <div role="tabpanel">
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
                                                <a href="{!! url('clientes/altera', ['id'=>$cliente->id]) !!}"> {!! $cliente->nome_fantasia !!}</a>
                                            </span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Razão Social:</th>
                                        <td>{!! $cliente->razao_social !!}</td>
                                        <th>Cliente desde:</th>
                                        <td>{!! $cliente->cliente_desde !!}</td>
                                    </tr>
                                    <tr>
                                        <th>CNPJ/CPF:</th>
                                        <td>{!! $cliente->cnpj_cpf !!}</td>
                                        <th>Insc. Est./RG:</th>
                                        <td>{!! $cliente->ie_rg !!}</td>
                                    </tr>
                                    <tr>
                                        <th>IM:</th>
                                        <td>{!! $cliente->im !!}</td>
                                        <th>Situação:</th>
                                        <td>{!! ($cliente->ativo) ? 'Ativo' : 'Inativo' !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Observações:</th>
                                        <td colspan="3">{!! $cliente->observações !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Logradouro:</th>
                                        <td>{!! $cliente->endereco->logradouro . ', '. $cliente->endereco->numero !!}</td>
                                        <th>Complemento:</th>
                                        <td> {!! $cliente->endereco->complemento !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Bairro:</th>
                                        <td>{!! $cliente->endereco->bairro !!}</td>
                                        <th>Cidade:</th>
                                        <td> {!! $cliente->endereco->cidade !!}</td>
                                    </tr>
                                    <tr>
                                        <th>CEP:</th>
                                        <td>{!! $cliente->endereco->cep !!}</td>
                                        <th>UF:</th>
                                        <td> {!! $cliente->endereco->uf !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Referência:</th>
                                        <td colspan="3">{!! $cliente->endereco->referencia !!}</td>
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
                                            <a href="{!! url('contatos/altera',
                                                ['className'=>$className, 'id'=>$cliente->contatoPrincipal->id ]) !!}
                                                ">
                                                {!! $cliente->contatoPrincipal->nome !!} {!! $cliente->contatoPrincipal->sobrenome !!}
                                            </a>
                                        </td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Cargo:</th>
                                        <td>{!! $cliente->contatoPrincipal->cargo !!}</td>
                                        <th>Setor:</th>
                                        <td>{!! $cliente->contatoPrincipal->setor !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Telefone:</th>
                                        <td>{!! $cliente->contatoPrincipal->telefone !!}</td>
                                        <th>Celular:</th>
                                        <td>{!! $cliente->contatoPrincipal->celular !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{!! $cliente->contatoPrincipal->email !!}</td>
                                        <th>Skype:</th>
                                        <td>{!! $cliente->contatoPrincipal->skype !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Aniversário:</th>
                                        <td>{!! $cliente->contatoPrincipal->aniversario !!}</td>
                                        <th>Detalhes:</th>
                                        <td>{!! $cliente->contatoPrincipal->observacoes !!}</td>
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
                            @foreach($cliente->contatos as $contato)
                                <tr>
                                    <td>{!! $contato->nome !!}</td>
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
    @include('clientes.sidebar')

    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#" class="tab-link  tab-link-title" id="overview"><span class="h4">Cliente</span></a></li>
        <li>
            <a href="#" class="tab-link" id="btn-novo-contato" data-owner-class="Cliente" data-owner-id="{{{ $cliente->id }}}">
                <i class="fa fa-phone"></i> Novo contato
            </a>
        </li>
        <li>
            <a href="#" class="tab-link" id="btn-print-ficha">
                <i class="fa fa-print"></i> Ficha cadastro
            </a>
        </li>
    </ul>
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
        });
    </script>
@stop