@extends('layout.app')

@section('title', 'Show product')

@section('content')

<div class="container">
    <h1>Show product</h1>

    <div class="mb-3">
        <b>ID: {{$product->id}}</b>    
    </div>
    <div class="mb-3">
        <b>Name: {{$product->name}}</b>    
    </div>
    <div class="mb-3">
        <b>Description: {{$product->description}}</b>    
    </div>
    <div class="mb-3">
        <b>Created At: {{$product->created_at}}</b>    
    </div>
    <div class="mb-3">
        <b>Updated At: {{$product->updated_at}}</b>    
    </div>
    <div class="mb-3">
        <b>Price: {{$product->price}}</b>    
    </div>
        <a href="{{route('products.index') }}" class="btn btn-secondary" role="button"><i class="bi bi-arrow-left"></i> Back</a>
</div>

@endsection