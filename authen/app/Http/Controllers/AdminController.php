<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    //hàm khởi tạo của class mà sẽ chjay ngay khi khởi tạo đối tượng
    //Hàm này Luôn được chạy trước trong các class
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }
    //
    //Phương thức trả về view khi đăng nhập admin thành công
    public function index(){
        return view('admin.dashboard');
    }
    //Phương thức trả ve view dùng để đăng kí tài khoản admin
    public function create(){
        return view('admin.auth.register');
    }
    public function store(Request $request){
        //validate dữ liệu được gửi từ form đi
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        //khởi tạo modelđẻ lưu admin mới
        $adminModel = new AdminModel();
        $adminModel->name = $request->name;
        $adminModel->email = $request->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();



        return redirect()->route('admin.auth.login');
    }


}
