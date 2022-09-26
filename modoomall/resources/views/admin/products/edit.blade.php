<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('제품 만들기') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<form action="{{route('admin.products.update', ['pdx' => $product->pdx])}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">제품 카테고리</label>
        <select name="categories[]" id="" multiple>
            @foreach ($productCategory as $category)
                <option value="{{$category->pcdx}}">{{$category->category_detail_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">순서</label>
        <input type="text" name="sequence" class="form-control" value="{{$product->sequence}}">
        @error('sequence')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">제목</label>
        <input type="text" name="title" class="form-control" value="{{$product->store_name}}">
        @error('title')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">제품명</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}">
        @error('name')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">가격</label>
        <input type="text" name="price" class="form-control" value="{{$product->price}}">
        @error('price')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">개수</label>
        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
        @error('quantity')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">내용</label>
        <input type="text" name="content" class="form-control" value="{{$product->content}}">
        @error('content')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">정상가</label>
        <input type="text" name="price_normal" class="form-control" value="{{$product->price_normal}}">
        @error('price_normal')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">배송비</label>
        <input type="text" name="delivery_origin_cost" class="form-control" value="{{$product->delivery_origin_cost}}">
        @error('delivery_origin_cost')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">제조사</label>
        <input type="text" name="supply" class="form-control" value="{{$product->supply}}">
        @error('supply')
            <x-alert level="info" message="{{$message}}" />
        @enderror
    </div>
    <div class="form-group">
        <label for="">상태</label>
        <select name="state" class="form-control">
            <option value="10" @if($product->state === 10) selected @endif>정상</option>
            <option value="0" @if($product->state === 0) selected @endif>삭제</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">수정하기</button>
    </div>
</form>
</div>
</div>
</div>
</x-app-layout>


