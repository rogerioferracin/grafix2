@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tintas.store']) !!}

        @include('tintas.fields')

    {!! Form::close() !!}
</div>
@endsection
