@extends('templates.master')

@section('content')
    <table class="table table-striped" id="tabela-clientes">
        <thead>
        <tr>
            <th>Nome</th>
            <th>CNPJ/CPF</th>
            <th>Contato</th>
            <th>Telefone</th>
            <th>Email</th>
            <th><i class="fa fa-edit" data-toggle="tooltip" title="Opções para financeira"></i> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($financeiras as $financeira)
            <tr>
                <td>{!! $financeira->nome_fantasia !!}</td>
                <td>{!! $financeira->cnpj_cpf !!}</td>
                <td>
                    {!! $financeira->contatoPrincipal->nome . ' ' . $financeira->contatoPrincipal->sobrenome !!}
                </td>
                <td>{!! $financeira->contatoPrincipal->telefone !!}</td>
                <td>{!! $financeira->contatoPrincipal->email !!}</td>
                <td>
                    <a href="{!! url('financeiras/altera', ['id'=>$financeira->id]) !!}"><i class="fa fa-folder-open"></i> </a> |
                    <a href="{!! url('financeiras/ficha', ['id'=>$financeira->id]) !!}"><i class="fa fa-list"></i> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    @include('financeiras.sidebar')
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            MakeDataTable('#tabela-clientes');
        });
    </script>
@stop
