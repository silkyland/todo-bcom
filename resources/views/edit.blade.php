@extends('layout.master')
@section('content')
    <hr>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                เพิ่มรายการ
            </h4>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/update/{{$post->id}}" role="form" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="inputName">กรอกชื่อรายการ :: </label>
                    <input type="text" name="detail" placeholder="ชื่อรายการ" class="form-control" value="{{$post->detail}}">
                </div>
                <div class="form-group">
                    <label for="selectCategory">เลือกหมวดหมู่ :: </label>
                    <select name="category_id" id="" class="form-control">
                        @foreach($categories as $item)
                            <option value="{{$item->id}}" @if($item->id == $post->category_id) selected @endif>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="complete" id="" class="form-control">
                        <option value="0" @if($post->complete == 0) selected @endif>ยังไม่ทำ</option>
                        <option value="1"@if($post->complete == 1) selected @endif>ทำเสร็จแล้ว</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> บันทึก</button>
            </form>
        </div>
    </div>
@endsection