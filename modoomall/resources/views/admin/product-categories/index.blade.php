<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('카테고리 만들기') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('admin.product-categories.create')}}" class="btn btn-success">카테고리 만들기</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>그룹</th>
                            <th>제목</th>
                            <th>세부제목</th>
                            <th>아이디</th>
                            <th>부모 아이디</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productCategories as $productCategory)
                            <tr>
                                <td>{{$productCategory->pcdx}}</td>
                                <td>{{$productCategory->group_id}}</td>
                                <td>{{$productCategory->category_name}}</td>
                                <td>{{$productCategory->category_detail_name}}</td>
                                <td>{{$productCategory->category_id}}</td>
                                <td>{{$productCategory->category_parent_id}}</td>
                                <td>
                                    <a href="{{route('admin.product-categories.edit', ['pcdx' => $productCategory->pcdx])}}" class="btn btn-primary">제품 수정</a>
                                    <form action="{{route('admin.product-categories.destroy', ['pcdx' => $productCategory->pcdx])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="카테고리 삭제" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
{{$productCategories->links()}}
</x-app-layout>
