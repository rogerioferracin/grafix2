<div class="form-group">
    {!! Form::label('financeira', 'Nome*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-6">
        {!! Form::text_with_error('financeira', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('taxa_juros', 'Taxa %*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-2">
        <div class="input-group">
            {!! Form::text_with_error('taxa_juros', null, array('class'=>'form-control'), $errors) !!}
            <span class="input-group-addon">%</span>
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::label('agencia', 'Agencia', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('agencia', null, array('class'=>'form-control')) !!}
    </div>

    {!! Form::label('conta', 'Conta', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('conta', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('observacoes', 'Observações', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::textarea('observacoes', null, array('class'=>'form-control', 'rows'=>'3')) !!}
    </div>
</div>