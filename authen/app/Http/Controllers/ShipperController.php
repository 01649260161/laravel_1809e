<?php

namespace App\Http\Controllers;

use App\Model\ShipperModel;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    //
    //hàm khởi tạo của class mà sẽ chjay ngay khi khởi tạo đối tượng
    //Hàm này Luôn được chạy trước trong các class
    public function __construct()
    {
        $this->middleware('auth:shipper')->only('index');
    }
    //Phương thức trả về view khi đăng nhập seller thành công
    public function index(){
        return view('shipper.dashboard');
    }
    //Phương thức trả ve view dùng để đăng kí tài khoản admin
    public function create(){
        return view('shipper.auth.register');
    }

    public function store(Request $request){
        //validate dữ liệu được gửi từ form đi
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        //khởi tạo modelđẻ lưu shipper mới
        $shipperModel = new ShipperModel();
        $shipperModel->name = $request->name;
        $shipperModel->email = $request->email;
        $shipperModel->password = bcrypt($request->password);
        $shipperModel->save();



        return redirect()->route('shipper.auth.login');
    }
}
