@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tinta, ['route' => ['tintas.update', $tinta->id], 'method' => 'patch']) !!}

        @include('tintas.fields')

    {!! Form::close() !!}
</div>
@endsection
