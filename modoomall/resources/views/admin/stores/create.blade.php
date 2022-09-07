@extends('layouts.app')

@section('content')
<h1>스토어 만들기</h1>
<form action="{{route('admin.stores.store')}}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="">스토어 이메일</label>
        <input type="email" name="store_email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">스토어명</label>
        <input type="text" name="store_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">스토어 전화번호</label>
        <input type="text" name="store_tel" class="form-control">
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
        <label for="">소유자</label>
        <select name="user" id="" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->udx}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">만들기</button>
    </div>
</form>
@endsection
