<!--- Nome Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!--- Escala Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('escala', 'Escala:') !!}
    {!! Form::text('escala', null, ['class' => 'form-control']) !!}
</div>

<!--- Ativo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('ativo', 'Ativo:') !!}
    {!! Form::text('ativo', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
