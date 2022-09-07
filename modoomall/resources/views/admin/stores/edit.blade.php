@extends('layouts.app')

@section('content')
<h1>스토어 만들기</h1>
<form action="{{route('admin.stores.update', ['sdx' => $store->sdx])}}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="">스토어 이메일</label>
        <input type="email" name="store_email" class="form-control" value="{{$store->store_email}}">
    </div>
    <div class="form-group">
        <label for="">스토어명</label>
        <input type="text" name="store_name" class="form-control" value="{{$store->store_name}}">
    </div>
    <div class="form-group">
        <label for="">스토어 전화번호</label>
        <input type="text" name="store_tel" class="form-control" value="{{$store->store_tel}}">
    </div>
    <div class="form-group">
        <label for="">상태</label>
        <select name="state" class="form-control">
            <option value="10" @if($store->state === 10) selected @endif>정상</option>
            <option value="0" @if($store->state === 0) selected @endif>삭제</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">만들기</button>
    </div>
</form>
@endsection
