@extends('Layouts.master')
@section('MainContent')
<ul class="container d-flex flex-wrap">
 @foreach($products as $product)
 <div class="card" style="width: 50%">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$product->title}}</h5>
    <p class="card-text">{{$product->body}}</p>
    <p class="card-text">{{$product->price}}</p>
    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-primary">edit</a>
    
  </div>
</div>
 @endforeach
</ul>
@endsection
