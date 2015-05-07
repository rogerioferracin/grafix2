@extends('templates.master')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Tintas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tintas.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tintas->isEmpty())
                <div class="well text-center">No Tintas found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Nome</th>
			<th>Escala</th>
			<th>Ativo</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                    @foreach($tintas as $tinta)
                        <tr>
                            <td>{!! $tinta->nome !!}</td>
					<td>{!! $tinta->escala !!}</td>
					<td>{!! $tinta->ativo !!}</td>
                            <td>
                                <a href="{!! route('tintas.edit', [$tinta->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('tintas.delete', [$tinta->id]) !!}" onclick="return confirm('Are you sure wants to delete this Tinta?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

    </div>
@endsection