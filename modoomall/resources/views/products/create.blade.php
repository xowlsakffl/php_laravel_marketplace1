<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('내 제품') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="">제품 카테고리</label>
                        <select name="pcdx" id="">
                            @foreach ($productCategory as $category)
                                <option value="{{$category->pcdx}}">{{$category->category_detail_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">순서</label>
                        <input type="text" name="sequence" class="form-control">
                        @error('sequence')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">제목</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">제품명</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">가격</label>
                        <input type="text" name="price" class="form-control">
                        @error('price')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">개수</label>
                        <input type="text" name="quantity" class="form-control">
                        @error('quantity')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">내용</label>
                        <input type="text" name="content" class="form-control">
                        @error('content')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">정상가</label>
                        <input type="text" name="price_normal" class="form-control">
                        @error('price_normal')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">배송비</label>
                        <input type="text" name="delivery_origin_cost" class="form-control">
                        @error('delivery_origin_cost')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">제조사</label>
                        <input type="text" name="supply" class="form-control">
                        @error('supply')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">제품 이미지</label>
                        <input type="file" name="files[]" class="form-control" multiple>
                        @error('files')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                        @error('slug')
                            <x-alert level="info" message="{{$message}}" />
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success">만들기</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

