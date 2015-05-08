@extends('templates.master')

@section('content')
    {!! Form::open(array('url'=>'usuarios/novo', 'class'=>'form-horizontal')) !!}
    <div class="panel-group" id="accordion">
        {{--PANEL DADOS ------------------------------------------------------- --}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="#dados" data-toggle="collapse" data-parent="#accordion">
                    <span class="panel-title">Dados de acesso</span>
                </a>
            </div>
            <div class="panel-collapse collapse in" id="dados">
                <div class="panel-body">
                    @include('users.partials._user_form')
                    {{--Cadastra Senha--}}
                    <div class="form-group">
                        {!! Form::label('password', 'Senha*', array('class'=>'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::password('password', array('class'=>'form-control')) !!}
                            @if($errors->has('password')) <span class="text-danger small"> {!! $errors->first('password') !!} </span> @endif
                        </div>

                        {!! Form::label('password_confirmation', 'Confirma senha*', array('class'=>'col-md-2 control-label')) !!}
                        <div class="col-md-4">
                            {!! Form::password('password_confirmation', array('class'=>'form-control')) !!}
                            @if($errors->has('password_confirmation')) <span class="text-danger small"> {!! $errors->first('password_confirmation') !!} </span> @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>{{--END PANEL GROUP--}}


    {{--BUTTON--}}
    <div class="col-md-12 clearfix">
        {!! Form::submit('Cadastrar', array('class'=>'btn btn-primary pull-right submit-confirm')) !!}
    </div>

    <div class="modal fade">

    </div>

    {!! Form::close() !!}
@stop


@section('sidebar')
    @include('users.sidebar')
@stop

@section('scripts')
    <script>
        $(document).ready(function(){

        })
    </script>
@stop