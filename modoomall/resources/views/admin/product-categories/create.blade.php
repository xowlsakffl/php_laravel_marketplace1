<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('카테고리 만들기') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('admin.product-categories.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="">그룹 아이디</label>
                        <input type="text" name="group_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">카테고리 제목</label>
                        <input type="text" name="category_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">카테고리 세부 제목</label>
                        <input type="text" name="category_detail_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">카테고리 아이디</label>
                        <input type="text" name="category_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">카테고리 부모 아이디</label>
                        <input type="text" name="category_parent_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">상태</label>
                        <select name="state" class="form-control">
                            <option value="10">정상</option>
                            <option value="0">삭제</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-success">만들기</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

