<?php

namespace App\Http\Controllers\Auth\Shipper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:shipper')->except('logout');
    }
    //Phương thức này trả về view dùng để đăng nhập cho seller
    public function login(){
        return view('shipper.auth.login');
    }

    //phương thúc này sẽ dùng để đăng nhập cho seller
    //lấy thông tin từ form co method là post

    public function loginShipper(Request $request){
        //validate
        $this->validate($request,array(
            'email'=>'required|email',
            'password'=>'required|min:6'
        ));

        //Đăng nhập
        if (Auth::guard('shipper')->attempt(
            ['email' => $request->email, 'password' => $request->password],  $request->remember
        )) {
            // nếu đăng nhập thành công thì chuyển hướng về view dashboard của shipper
            return redirect()->intended(route('shipper.dashboard'));
        }
        //Nếu đăng nhập thất bại thì quay trở về form đăng nhập với giá trị của 2 ô input cũ là email và rememmber
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    //phương thức này dùng để đằng xuất

    public function logout(){
        Auth::guard('shipper')->logout();

        //Chuyển hướng về trang login của seller
        return redirect(route('shipper.auth.login'));
    }
}
