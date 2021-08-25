@extends('layout')
@section('title', 'Lista de categorias')
@section('palabra', 'Listado de categorias')
@section('content')
<a href="{{ route('category.form')}}" class="btn btn-primary">Nueva categoria</a>
@if(Session::has('message'))
     <p class="text-danger"> {{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
     <p class="text-info"> {{ Session::get('successMessage') }}</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>

            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>

            <td>
                <a href="{{ route('category.form', ['id'=>$category->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection
