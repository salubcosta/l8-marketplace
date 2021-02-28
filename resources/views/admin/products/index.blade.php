@extends('layouts.app')
@section('content')
    @if(!$products)
        <p>
            <label class="text-info">Você ainda não possui um loja!</label>
        </p>
    @else
    <a href="{{route('admin.products.create')}}" class="btn btn-success">Novo Produto</a>
    <table class="table table-striped">
        <thead>
            <tr style="text-align: right">
                <th>ID</th>
                <th style="text-align: left">Nome</th>
                <th style="text-align: left">Loja</th>
                <th>Preço</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td align="right">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->store->name}}</td>
                <td align="right">R$ {{number_format($product->price,2,',','.')}}</td>
                <td align="right">
                    <div class="btn-group">
                        <a href="{{route('admin.products.edit',['product'=>$product->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{route('admin.products.destroy',['product'=>$product->id])}}" method="POST">
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
    {{$products->links()}}
    @endif
@endsection