<div class="form-group">
    {!! Form::label('name', 'Nome*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, array('class'=>'form-control')) !!}
        @if($errors->has('name')) <span class="text-danger small"> {!! $errors->first('name') !!} </span> @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('username', 'Usuário*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('username', null, array('class'=>'form-control')) !!}
        @if($errors->has('username')) <span class="text-danger small"> {!! $errors->first('username') !!} </span> @endif
    </div>

    {!! Form::label('email', 'Email*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('email', null, array('class'=>'form-control')) !!}
        @if($errors->has('email')) <span class="text-danger small"> {!! $errors->first('email') !!} </span> @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('funcao_id', 'Função*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::select('funcao_id', Grafix\Models\Funcao::getFuncoes() ,null, array('class'=>'form-control')) !!}
        @if($errors->has('funcao_id')) <span class="text-danger small"> {!! $errors->first('funcao_id') !!} </span> @endif
    </div>
    {!! Form::label('dica_senha', 'Dica da senha', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('dica_senha', null, array('class'=>'form-control')) !!}
    </div>
</div>
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