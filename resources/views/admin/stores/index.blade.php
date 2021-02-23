@extends('layouts.app')
@section('content')
    @if(!$store)
        <a href="{{route('admin.stores.create')}}" class="btn btn-success mb-4">Nova loja</a>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loja</th>
                <th>Total de Produtos</th>
                <th style="text-align: right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td align="right">
                    <div class="btn-group">
                        <a href="{{route('admin.stores.edit',['store'=>$store->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{route('admin.stores.destroy',['store'=>$store->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="ml-1 btn btn-sm btn-danger">Remover</a>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection