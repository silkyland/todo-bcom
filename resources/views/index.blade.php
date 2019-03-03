@extends('layout.master')
@section('content')

<p>กรองสถานะ : <a href="#">ทั้งหมด</a> | <a href="#">Completed</a> | <a href="#">Incomplete</a></p>
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <i class="fa fa-list"></i> รายการที่ต้องทำ
            @if(auth()->check())
            <span class="pull-right"><a href="/create" class="btn btn-xs btn-success"><i class="fa fa-plus"></i> เพิ่มรายการ</a></span>
            @endif
        </h4>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>ชื่อรายการ</th>
            <th>หมวดหมู่</th>
            <th>สถานะ</th>
            @if(auth()->check())
            <th>จัดการ</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->detail}}</td>
            <td>{{$item->category->name}}</td>
            <td>
                @if($item->complete == 0)
                    ยังไม่ทำ
                @else
                    ทำเสร็จแล้ว
                @endif
            </td>
            @if(auth()->check())
            <td>
                <a href="/edit/{{$item->id}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> edit</a>
                <a href="/delete/{{$item->id}}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> delete</a>
            </td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
    {{$posts->links()}}
@endsection