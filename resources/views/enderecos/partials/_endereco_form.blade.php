<div class="form-group">
    <div class="col-md-12 clearfix text-right">
        <button class="btn btn-default btn-sm" id="btn-busca-endereco" type="button"><i class="fa fa-search"></i> Busca endereço</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('logradouro', 'Logradouro*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-6">
        {!! Form::text_with_error('logradouro', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('numero', 'Número*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-2">
        {!! Form::text_with_error('numero', null, array('class'=>'form-control'), $errors) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('complemento', 'Complemento', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('complemento', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('bairro', 'Bairro', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('bairro', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('cidade', 'Cidade', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('cidade', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('uf', 'UF', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-2">
        {!! Form::text('uf', null, array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('cep', 'CEP', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-2">
        {!! Form::text('cep', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('referencia', 'Referência', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-6">
        {!! Form::text('referencia', null, array('class'=>'form-control')) !!}
    </div>
</div>