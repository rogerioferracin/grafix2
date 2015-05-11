<div class="form-group">
    {!! Form::label('name', 'Nome*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::text_with_error('name', null, array('class'=>'form-control'), $errors) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('username', 'Usuário*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('username', null, array('class'=>'form-control'), $errors) !!}
    </div>

    {!! Form::label('email', 'Email*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('email', null, array('class'=>'form-control'), $errors) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('funcao_id', 'Função*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::select('funcao_id', Grafix\Models\Funcao::getFuncoes() ,null, array('class'=>'form-control')) !!}
        @if($errors->has('funcao_id')) <span class="text-danger small"> {!! $errors->first('funcao_id') !!} </span> @endif
    </div>
    {!! Form::label('dica_de_senha', 'Dica da senha', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('dica_de_senha', null, array('class'=>'form-control')) !!}
    </div>
</div>