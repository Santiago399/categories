@extends('layout')
@section('title', 'Lista de marcas')
@section('palabra', 'Listado de marcas')
@section('content')
<a href="{{ route('brands.form')}}" class="btn btn-primary">Nuevo Producto</a>
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

            <th> </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list as $brands)
        <tr>
            <td>{{ $brands->name }}</td>

            <td>
                <a href="{{route('brands.form', ['id'=>$brands->id])}}" class="btn btn-warning">Editar</a>
                <a href="{{route('brands.delete',['id'=>$brands->id])}}" class="btn btn-danger">Borrar</a>
                {{--<a href="/product/delete/{{$product->id}}" class="btn btn-danger">Borrar</a>--}}
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
@endsection
