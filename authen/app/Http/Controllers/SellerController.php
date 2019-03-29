<?php

namespace App\Http\Controllers;

use App\Model\SellerModel;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    //hàm khởi tạo của class mà sẽ chjay ngay khi khởi tạo đối tượng
    //Hàm này Luôn được chạy trước trong các class
    public function __construct()
    {
        $this->middleware('auth:seller')->only('index');
    }
    //Phương thức trả về view khi đăng nhập seller thành công
    public function index(){
        return view('seller.dashboard');
    }
    //Phương thức trả ve view dùng để đăng kí tài khoản admin
    public function create(){
        return view('seller.auth.register');
    }

    public function store(Request $request){
        //validate dữ liệu được gửi từ form đi
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        //khởi tạo modelđẻ lưu seller mới
        $sellerModel = new SellerModel();
        $sellerModel->name = $request->name;
        $sellerModel->email = $request->email;
        $sellerModel->password = bcrypt($request->password);
        $sellerModel->save();



        return redirect()->route('seller.auth.login');
    }
}
