<div class="form-group">
    {!! Form::label('nome', 'Nome*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('nome', null, array('class'=>'form-control')) !!}
        @if($errors->has('nome')) <span class="text-danger small"> {!! $errors->first('nome') !!} </span> @endif
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
        {!! Form::text('telefone', null, array('class'=>'form-control')) !!}
        @if($errors->has('telefone')) <span class="text-danger small"> {!! $errors->first('telefone') !!} </span> @endif
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
    {!! Form::label('lembrar_anivsersario', 'Lembrar?', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-md-4">
        <div class="checkbox">
            {!! Form::checkbox('lembrar_anivsersario', 1, 1) !!}
        </div>
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