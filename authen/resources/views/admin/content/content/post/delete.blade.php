@extends('admin.layouts.glance')
@section('title')
    Xoá Danh Mục
@endsection
@section('content')
    <h1>Xóa Sản Phẩm {{$post->id .' : '.$post->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="post" action="{{ url('admin/content/post/'.$post->id.'/delete') }}" method="post">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Delete</button>
                </div>
            </form>
        </div>
    </div>

@endsection