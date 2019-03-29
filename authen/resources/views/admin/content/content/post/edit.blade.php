@extends('admin.layouts.glance')
@section('title')
    Sửa Danh Mục
@endsection
@section('content')
    <h1>Sửa Bài Viết {{$post->id .' : '.$post->name}}</h1>
    <div class="row">
        <div class="form-three widget-shadow">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" name="post" action="{{ url('admin/content/post/'.$post->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Tên Bài Viết</label>
                    <div class="col-sm-8">
                        <input type="text" name="name" class="form-control1" id="focusedinput" value="{{$post->name}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Danh Mục</label>
                    <div class="col-sm-8">
                        <select name="cat_id" id="">
                            <option value="">Không Có Danh Mục</option>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}" <?php echo ($post->cat_id == $cat->id)? 'selected':'' ?>>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                        <input type="text" name="slug" class="form-control1" id="focusedinput" value="{{$post->slug}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="focusedinput" class="col-sm-2 control-label">Images</label>
                    <div class="col-sm-8">
                        <input type="text" name="images" class="form-control1" id="focusedinput" value="{{$post->images}}" placeholder="Default Input">
                    </div>
                    <div class="col-sm-2">
                        <p class="help-block">Your help text!</p>
                    </div>
                </div>




                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô Tả Ngắn</label>
                    <div class="col-sm-8"><textarea name="intro" id="txtarea1" cols="50" rows="4"  class="form-control1">{{$post->intro}}</textarea></div>
                </div>

                <div class="form-group">
                    <label for="txtarea1" class="col-sm-2 control-label">Mô Tả</label>
                    <div class="col-sm-8"><textarea name="desc" id="txtarea1" cols="50" rows="4"  class="form-control1">{{$post->desc}}</textarea></div>
                </div>

                <div class="col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

@endsection