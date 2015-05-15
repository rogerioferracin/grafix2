@extends('templates.master')

@section('content')
    {!! Form::model($model, array('url'=>['financeiras/altera', 'id'=>$model->id], 'method'=>'put', 'class'=>'form-horizontal')) !!}
    <div class="panel-group" id="accordion">
        {{--PANEL DADOS ------------------------------------------------------- --}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="#dados" data-toggle="collapse" data-parent="#accordion">
                    <span class="panel-title">Dados da financeira</span>
                </a>
            </div>
            <div class="panel-collapse collapse in" id="dados">
                <div class="panel-body">
                    @include('financeiras.partials._financeira_form')
                </div>
            </div>
        </div>
        {{--PANEL ENDERECO ------------------------------------------------------- --}}
        <div class="panel panel-info">
            <div class="panel-heading">
                <a href="#endereco" data-toggle="collapse" data-parent="#accordion">
                    <span class="panel-title">Endereco</span>
                </a>
            </div>
            <div class="panel-collapse collapse" id="endereco">
                <div class="panel-body">
                    @include('enderecos.partials._endereco_update_form')
                </div>
            </div>
        </div>
        {{--END PANEL GROUP--}}
    </div>
    {{--BUTTON--}}
    <div class="col-md-12 clearfix">
        {!! Form::submit('Atualizar', array('class'=>'btn btn-primary pull-right submit-confirm')) !!}
    </div>
    {!! Form::close() !!}
@stop


@section('sidebar')
    @include('financeiras.sidebar')
@stop