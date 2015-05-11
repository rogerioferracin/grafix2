<div class="form-group">
    {!! Form::label('razao_social', 'Razão Social*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('razao_social', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('nome_fantasia', 'Nome Fantasia', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('nome_fantasia', null, array('class'=>'form-control'), $errors) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('cnpj_cpf', 'CNPJ/CPF*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('cnpj_cpf', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('ie_rg', 'IE/RG', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('ie_rg', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group has-feedbackss">
    {!! Form::label('im', 'IM', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('im', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('cliente_desde', 'Cliente desde:', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4 has-feedback">
        {!! Form::text('cliente desde', null, array('class'=>'form-control date')) !!}
        <span class="fa fa-calendar form-control-feedback"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('observacoes', 'Observações', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::textarea('observacoes', null, array('class'=>'form-control', 'rows'=>3)) !!}
    </div>
</div>