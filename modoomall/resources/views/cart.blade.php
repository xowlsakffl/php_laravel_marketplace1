<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('장바구니') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart as $c)
                        <br>
                        <div>이름 {{$c['name']}}</div>
                        <div>가격 {{number_format($c['price'], 2, ',', '.')}}</div>
                        <div>갯수 {{$c['quantity']}}</div>
                        @php
                            $subtotal = $c['price'] * $c['quantity'];
                            $total += $subtotal;
                        @endphp
                        <div>총 가격{{number_format($subtotal, 2, ',', '.')}}</div>
                        <a href="{{route('cart.remove', ['slug' => $c['slug']])}}">삭제</a>
                        <br>
                        <br>
                        <br>
                    @endforeach
                    <div>{{number_format($total, 2, ',', '.')}}</div>
                    <hr>
                    <a href="{{route('cart.cancel')}}">구매 취소</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
