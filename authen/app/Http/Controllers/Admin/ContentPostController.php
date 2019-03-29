<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\ContentCategoryModel;
use App\Model\Admin\ContentPostModel;
use App\Model\Admin\ShopCategoryModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ContentPostController extends Controller
{
    //
    public function index(){
        $items = DB::table('content_post')->paginate(10);

        /*
         * Đây là biến truyền từ Controller Xuống View
         * */

        $data = array();
        $data['posts']=$items;


        return view('admin.content.content.post.index',$data);
    }
    public function create(){
        /*
                 * Đây là biến truyền từ Controller Xuống View
                 * */
        $data = array();

        $cats = ContentCategoryModel::all();
        $data['cats']=$cats;

        return view('admin.content.content.post.submit',$data);
    }
    public function edit($id){
        $data = array();

        $item = ContentPostModel::find($id);
        $data['post']=$item;

        $cats = ContentCategoryModel::all();
        $data['cats']=$cats;

        return view('admin.content.content.post.edit',$data);
    }
    public function delete($id){
        $data = array();

        $item = ContentpostModel::find($id);
        $data['post']=$item;

        return view('admin.content.content.post.delete',$data);
    }
    public function update(Request $request,$id){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            //'author_id' => 'required',
            //'view' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);
        $input = $request->all();

        $item = ContentPostModel::find($id);

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->author_id = isset($input['author_id'])?$input['author_id']:0;
        $item->view = isset($input['view'])?$input['view']:0;
        $item->cat_id = $input['cat_id'];


        $item->save();

        return redirect('/admin/content/post');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required',
            'images' => 'required',
            //'author_id' => 'required',
            //'view' => 'required',
            'intro' => 'required',
            'desc' => 'required',
        ]);
        $input = $request->all();

        $item = new contentpostModel();

        $item->name = $input['name'];
        $item->slug = $input['slug'];
        $item->images = $input['images'];
        $item->intro = $input['intro'];
        $item->desc = $input['desc'];
        $item->author_id = isset($input['author_id'])?$input['author_id']:0;
        $item->view = isset($input['view'])?$input['view']:0;
        $item->cat_id = $input['cat_id'];

        $item->save();

        return redirect('/admin/content/post');
    }
    public function destroy($id){
        $item = contentpostModel::find($id);

        $item->delete();

        return redirect('/admin/content/post');
    }
}
