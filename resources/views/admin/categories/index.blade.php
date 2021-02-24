@extends('layouts.app')
@section('content')
    <a href="{{route('admin.categories.create')}}" class="btn btn-success mb-4">Nova Categoria</a>
    <table class="table table-striped">
        <thead>
            <tr style="text-align: right">
                <th>ID</th>
                <th style="text-align: left">Nome</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td align="right">{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td align="right">
                    <div class="btn-group">
                        <a href="{{route('admin.categories.edit',['category'=>$category->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{route('admin.categories.destroy',['category'=>$category->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="ml-1 btn btn-sm btn-danger">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@endsection