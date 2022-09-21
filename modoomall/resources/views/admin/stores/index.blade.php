<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <a href="{{route('admin.stores.create')}}" class="btn btn-success">스토어 만들기</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>스토어명</th>
                            <th>버튼</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $store)
                            <tr>
                                <td>{{$store->sdx}}</td>
                                <td>{{$store->store_name}}</td>
                                <td>
                                    <a href="{{route('admin.stores.edit', ['sdx' => $store->sdx])}}" class="btn btn-primary">스토어 수정</a>
                                    <form action="{{route('admin.stores.destroy', ['sdx' => $store->sdx])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="스토어 삭제" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
{{$stores->links()}}
</x-app-layout>