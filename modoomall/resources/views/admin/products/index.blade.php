@extends('layouts.app')

@section('content')
<a href="{{route('admin.stores.create')}}" class="btn btn-success">Create</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->pdx}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <a href="{{route('admin.products.edit', ['pdx' => $product->pdx])}}" class="btn btn-primary">edit</a>
                    <a href="{{route('admin.products.destroy', ['pdx' => $product->pdx])}}" class="btn btn-danger">delete</a>
                </td>
            </tr>
        @endforeach  
    </tbody>
</table>

{{$products->links()}}
@endsection