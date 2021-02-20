@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form action="{{route('admin.products.update', ['product'=>$product->id])}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nome Produto</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}">
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="body" class="form-control" cols="30" rows="10">{{$product->body}}</textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success ">Atualizar Produto</button>
        </div>
    </form>
@endsection