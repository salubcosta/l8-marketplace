@extends('layouts.app')
@section('content')
    <a href="{{route('admin.stores.create')}}" class="btn btn-success">Nova loja</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th align="left">Loja</th>
                <th align="right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
            <tr>
                <td align="right">{{$store->id}}</td>
                <td>{{$store->name}}</td>
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
            @endforeach
        </tbody>
    </table>
    {{$stores->links()}}
@endsection