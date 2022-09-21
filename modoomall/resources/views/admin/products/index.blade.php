<x-app-layout>
<a href="{{route('admin.stores.create')}}" class="btn btn-success">Create</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>name</th>
            <th>price</th>
            <th>quantity</th>
            <th>스토어명</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->pdx}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->name}}</td>
                <td>{{number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->store->store_name}}</td>
                <td>
                    <a href="{{route('admin.products.edit', ['pdx' => $product->pdx])}}" class="btn btn-primary">제품 수정</a>
                    <form action="{{route('admin.products.destroy', ['pdx' => $product->pdx])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="제품 삭제" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach  
    </tbody>
</table>

{{$products->links()}}
</x-app-layout>