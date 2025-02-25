@extends('layout.app')

@section('title', 'Products list')

@section('content')

<div class="container">
    <h1>Products list</h1>

    @if (session('success'))
        <div class="alert alert-success mt-2">
            {{session('success')}}
        </div>
    @endif

    <div class="text-end">
        <a href="{{route('products.create') }}" class="btn btn-primary"><i class="bi bi-plus"></i>Create</a>
    </div>    
    <table class="table text-end">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>
                        <a href="{{route('products.show', $product->id) }}" class="btn btn-info"><i class="bi bi-eye me-1"></i>View</a>
                        <a href="{{route('products.edit', $product->id) }}" class="btn btn-success"><i class="bi bi-pencil me-1"></i>Edit</a>
                        <form action="{{route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="bi bi-trash me-1"></i>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection