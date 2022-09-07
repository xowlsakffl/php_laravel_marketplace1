@extends('layouts.app')

@section('content')
<a href="{{route('admin.stores.create')}}" class="btn btn-success">Create</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Store Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
            <tr>
                <td>{{$store->sdx}}</td>
                <td>{{$store->store_name}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['sdx' => $store->sdx])}}" class="btn btn-primary">edit</a>
                    <a href="{{route('admin.stores.destroy', ['sdx' => $store->sdx])}}" class="btn btn-danger">delete</a>
                </td>
            </tr>
        @endforeach  
    </tbody>
</table>

{{$stores->links()}}
@endsection