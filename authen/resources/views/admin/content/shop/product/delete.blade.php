@extends('admin.layouts.glance')
@section('title')
    Xoá Sản Phẩm
@endsection
@section('content')
    <h1>Xóa Sản Phẩm {{$product->id .' : '.$product->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            <form class="form-horizontal" name="product" action="{{ url('admin/shop/product/'.$product->id.'/delete') }}" method="post">
                @csrf

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Delete</button>
                </div>
            </form>
        </div>
    </div>

@endsection