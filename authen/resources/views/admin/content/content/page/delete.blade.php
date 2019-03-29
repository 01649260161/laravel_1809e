@extends('admin.layouts.glance')
@section('title')
    Xoá Danh Mục
@endsection
@section('content')
    <h1>Xóa Danh Mục {{$cat->id .' : '.$cat->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="category" action="{{ url('admin/shop/category/'.$cat->id.'/delete') }}" method="post">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Delete</button>
                </div>
            </form>
        </div>
    </div>

@endsection