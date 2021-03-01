@extends('layouts.front')

@section('content')
<div class="row">
    <div class="col-6">
        @if($product->photos->count())
            <img src="{{asset('storage/'.$product->photos->first()->image)}}" alt="" class="img-fluid">
            <div class="row mt-2">
                @foreach ($product->photos as $photo)
                    <div class="col-4">
                        <img src="{{asset('storage/'.$photo->image)}}" alt="" class="img-fluid">
                    </div>
                @endforeach
            </div>
        @else
            <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="img-fluid">
        @endif
    </div>
    <div class="col-6">
        <h2>{{$product->name}}</h2>
        <p>
            {{$product->description}}
        </p>
        <h3>
            R$ {{number_format($product->price, '2', ',', '.')}}
        </h3>
        <span>
            Loja: {{$product->store->name}}
        </span>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <hr>
        <p>
            {{$product->body}}
        </p>
    </div>
</div>
@endsection