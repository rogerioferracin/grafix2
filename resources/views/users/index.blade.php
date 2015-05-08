@extends('templates.master')

@section('content')
    <div ng-controller="UserCrtl">
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
                        {{--Testa se usuario logado é ADM--}}
                        @if(auth()->id() === 1)
                            <button class="btn-link" ng-click="deleteUser({{$user->id}})">
                                <i class="fa fa-trash" data-toggle="tooltip" title="Exclui usuário"></i>
                            </button> |
                        @endif
                        {{--Testa se usuario logado é o mesmo da ficha--}}
                        @if(auth()->id() === $user->id || auth()->id() === 1)
                            <a href="{!! url('usuarios/altera', ['id'=>$user->id]) !!}"><i class="fa fa-folder-open" data-toggle="tooltip" title="Altera usuário"></i> </a> |
                        @endif
                        <a href="{!! url('usuarios/ficha', ['id'=>$user->id]) !!}"><i class="fa fa-list" data-toggle="tooltip" title="Ficha de usuário"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
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