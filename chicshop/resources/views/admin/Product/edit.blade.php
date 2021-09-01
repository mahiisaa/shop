@extends('Layouts.master')
@section('MainContent')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
  @foreach($errors->all() as $error)
  <li>
      {{$error}}
  </li>
  @endforeach
  </ul>
</div>
@endif
<form action="/admin/products/{{$product->id}}/edit" method="post">
@csrf
<div class="form-group">
<input type="text" name="title" class="form-control" value={{$product->title}} >
</div>
    <div class="form-group">
    <textarea name="body" id="body" cols="30" rows="10" class="form-control">
    {{$product->body}}
     </textarea>
    </div>
    
     <button class="btn btn-danger">
         submit
     </button>
</form>
@endsection