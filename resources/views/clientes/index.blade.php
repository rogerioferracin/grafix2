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
            <th><i class="fa fa-edit" data-toggle="tooltip" title="Opções para cliente"></i> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{!! $cliente->nome_fantasia !!}</td>
                <td>{!! $cliente->cnpj_cpf !!}</td>
                <td>
                    {!! $cliente->contatoPrincipal->nome . ' ' . $cliente->contatoPrincipal->sobrenome !!}
                </td>
                <td>{!! $cliente->contatoPrincipal->telefone !!}</td>
                <td>{!! $cliente->contatoPrincipal->email !!}</td>
                <td>
                    <a href="{!! url('clientes/atualiza', ['id'=>$cliente->id]) !!}"><i class="fa fa-folder-open"></i> </a> |
                    <a href="{!! url('clientes/ficha', ['id'=>$cliente->id]) !!}"><i class="fa fa-list"></i> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    @include('clientes.sidebar')
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            MakeDataTable('#tabela-clientes');
        });
    </script>
@stop
