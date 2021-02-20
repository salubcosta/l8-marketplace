@extends('layouts.app')

@section('content')
    <h1>Criar Produto</h1>

    <form action="{{route('admin.products.store')}}" method="POST">
        @csrf
        @method('post')
        <div class="form-group">
            <label>Nome Produto</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label>Conteúdo</label>
            <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label>Lojas</label>
            <select name="store" class="form-control">
                @foreach ($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success ">Criar Product</button>
        </div>
    </form>
@endsection