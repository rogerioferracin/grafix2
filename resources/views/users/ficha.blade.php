@extends('templates.master')

@section('content')
    <table class="table table-responsive">
        <tbody>
            {{--TABELA DADOS DE ACESSO--}}
            <tr>
                <th class="h3">Dados de acesso</th>
            </tr>
            <tr>
                <td>
                    <table class="table table-bordered tabela-ficha-dados">
                        <thead>
                            <tr>
                                <th>Nome completo:</th>
                                <td colspan="3"><span class="h4">{!! $user->name !!}</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nome de usuário:</th>
                                <td>{!! $user->username !!}</td>
                                <th>Email:</th>
                                <td>{!! $user->email !!}</td>
                            </tr>
                            <tr>
                                <th>Função:</th>
                                <td>{!! $user->funcao->funcao !!}</td>
                                <th>Dica da senha:</th>
                                <td>{!! $user->dica_de_senha !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>



@stop

@section('sidebar')
    @include('users.sidebar')

    @if(auth()->id() === $user->id || auth()->id() === 1)
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#" class="tab-link  tab-link-title" id="overview"><span class="h4">Usuário</span></a></li>
        <li>
            <a href="#" class="tab-link" id="btn-troca-senha">
                <i class="fa fa-lock"></i> Troca senha
            </a>
        </li>
    </ul>
    @endif
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#btn-troca-senha').click(function(e){
                MakeTrocaSenhaModal({!! $user->id !!});
            })
        });
    </script>
@stop