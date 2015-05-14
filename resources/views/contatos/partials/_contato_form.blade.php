<div class="form-group">
    {!! Form::label('nome', 'Nome*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('nome', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('sobrenome', 'Sobrenome', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('sobrenome', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('cargo', 'Cargo', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('cargo', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('setor', 'Setor', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('setor', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('telefone', 'Telefone*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text_with_error('telefone', null, array('class'=>'form-control'), $errors) !!}
    </div>
    {!! Form::label('celular', 'Celular', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('celular', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('skype', 'Skype', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('skype', null, array('class'=>'form-control')) !!}
    </div>
    {!! Form::label('email', 'Email', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('email', null, array('class'=>'form-control')) !!}
    </div>
</div>

<div class="form-group has-feedback">
    {!! Form::label('aniversario', 'Aniversário', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('aniversario', null, array('class'=>'form-control date')) !!}
        <span class="fa fa-calendar form-control-feedback"></span>
    </div>
</div>

<div class="form-group">
    {!! Form::label('observacoes', 'Observações', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-10">
        {!! Form::textarea('observacoes', null, array('class'=>'form-control', 'rows'=>'3')) !!}
    </div>
</div>

<script>
    $(document).ready(function(){
        MakeDateTimePicker('.date', 'date');
    });
</script>