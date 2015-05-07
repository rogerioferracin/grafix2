@extends('templates.master')

@section('content')
    <table class="table table-striped" id="tabela-usuarios">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Username</th>
            <th>Email</th>
            <th>Grupo</th>
            <th><i class="fa fa-edit" data-toggle="tooltip" title="Opções para usuário"></i> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->funcao->funcao }}</td>
                <td>
                    <a href="{!! url('usuarios/atualiza', ['id'=>$user->id]) !!}"><i class="fa fa-folder-open" data-toggle="tooltip" title="Atualiza usuário"></i> </a> |
                    <a href="{!! url('usuarios/ficha', ['id'=>$user->id]) !!}"><i class="fa fa-list" data-toggle="tooltip" title="Ficha de usuário"></i> </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    @include('users.sidebar')
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            MakeDataTable('#tabela-usuarios');
        });
    </script>
@stop