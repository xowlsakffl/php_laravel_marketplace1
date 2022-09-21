<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('스토어 수정') }}
        </h2>
        <a href="{{route('products.create')}}" class="btn btn-success">제품 생성</a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($products as $product)
                <div class="p-6 bg-white border-b border-gray-200">
                    <tr>
                        <td>{{$product->pdx}}</td>
                        <td><a href="{{route('products.show', ['pdx' => $product->pdx])}}">{{$product->title}}</a></td>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->price, 2, ',', '.')}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->store->store_name}}</td>
                        <td>
                            <a href="{{route('products.edit', ['pdx' => $product->pdx])}}" class="ml-3">제품 수정</a>
                            <form action="{{route('products.destroy', ['pdx' => $product->pdx])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="제품 삭제" class="ml-3">
                            </form>
                        </td>
                    </tr>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
    {{$products->links()}}
</x-app-layout>
