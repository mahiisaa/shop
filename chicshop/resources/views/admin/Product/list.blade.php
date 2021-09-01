@extends('Layouts.master')
@section('MainContent')
<a href="/admin/products/create" class="btn btn-primary">add</a>
<ul class="container d-flex flex-wrap">
 @foreach($products as $product)
 <div class="card" style="width: 50%">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$product->title}}</h5>
    <p class="card-text">{{$product->body}}</p>
    <p class="card-text">{{$product->price}}</p>
    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-primary">edit</a>
   <form action="/admin/products/{{$product->id}}" method="post">
     @csrf
     @method('delete')
     <button class="btn btn-danger">
     delete
     </button>
   </form>
    
  </div>
</div>
 @endforeach
</ul>
@endsection
