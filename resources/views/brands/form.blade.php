@extends('layout')
@section('title', $brands ->id ?'Editar  Marca ' : 'Nuevo  Marca')
@section('palabra', $brands ->id ?'Editar Marca ' : 'Nuevo  Marca')

@section('content')
<form action=" {{ route('brands.save')}} " method="post">
    @csrf
    <input type="hidden" name="id" value="{{$brands->id}}">

<div class="mb-3 row">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name='name' value="{{@old('name') ? @old('name') : $brands->name}}">
    </div>
    @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
</div>



<div class="mb-3 row">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
        <a href="/brands" class="btn btn-secondary"> Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
</form>

@endsection
