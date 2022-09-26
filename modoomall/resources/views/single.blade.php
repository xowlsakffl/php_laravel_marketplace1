<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="sm:max-w-md mt-6 px-6 py-4 bg-white">
                        @if ($product->files->count())
                            <img src="{{asset('storage/'.$product->files->first()->real_name)}}" alt="">
                        @else
                            <img src="{{asset('assts/img/no-photo.jpg')}}" alt="">
                        @endif
                        <div>{{$product->name}}</div>
                        <div>{{$product->price}}</div>
                        <div>
                            <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product[name]" value="{{$product->name}}">
                                <input type="hidden" name="product[price]" value="{{$product->price}}">
                                <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                                <label for="quantity">갯수</label>
                                <input type="number" name="product[quantity]" value="1">
                                <button href="">장바구니 담기</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>