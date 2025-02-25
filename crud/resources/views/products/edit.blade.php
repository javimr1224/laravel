@extends('layout.app')

@section('title', 'Edit product')

@section('content')

<div class="container">
    <h1>Edit product</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('products.update', $product->id)}}" method="POST">
        @csrf
        @method('PATCH')
        
        <div class="mb-3">
            <b>ID: {{$product->id}}</b>    
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{$product->name}}">
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}" placeholder="price">
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Submit</button>
        <a href="{{route('products.index') }}" class="btn btn-secondary" role="button"><i class="bi bi-arrow-left"></i> Back</a>
    </form>
</div>

@endsection