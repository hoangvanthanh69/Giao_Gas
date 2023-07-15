<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\tbl_admin;
use Session;
class AuthController extends Controller
{

    // hiển thị khung đăng nhập cho khách hàng
    function showLoginForm(){
        if(!Session::get('home')){
            return view('frontend.dangnhap');
        }
        else {
            return redirect()->route('home');
        }
        return view('frontend.dangnhap');
    }

    // xử lý đăng nhập cho khách hàng
    function dangnhap(Request $request){
        $data = $request -> all();
        $password = $data['password'];
        $user = users::where(['email' => $data['email'], 'password' => $password])->first();
        if($user) {
            Session::put('home',[
                'id' => $user -> id,
                'email' => $user -> email,
                'password' => $user -> password,
                'name' => $user -> name,
            ]);
            if (Session::get('home') != NULL){
                return redirect()->route('home');
            }
            else {
                return redirect()->back();
            }
        }
        else {
            return redirect()->back();
        }
    }

    // hiển thị khung đk cho khách hàng
    function register(){
        return view('frontend.register');
    }

    // xử lý đk tk cho khách hàng
    function registers(Request $request){
        $user = new users([
            'name' => $request -> input('name'),
            'email' => $request -> input('email'),
            'password' => $request -> input('password'),
        ]);
        $user -> save();
        return redirect('/dangnhap');
    }

    // đăng xuất tài khoản khách hàng
    function logoutuser(){
        Session::forget('home');
        return redirect()->back();
    }

    // hiển thị khung đăng nhập cho quản trị viên
    function login(){
        return view('frontend.login');
    }

    // xử lý đăng nhập cho admin
    function getlogin(Request $request){
        $data = $request -> all();
        $password = $data['admin_password'];
        $result = tbl_admin::where(['admin_email' => $data['admin_email'], 'admin_password' => $data['admin_password']])->first();
        if($result){
            Session::put('admin_img', $result->image_staff);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin',[
                'admin_id' => $result->admin_id,
                'username' => $result->admin_email,
                'password' => $result->admin_password,
                'admin_name' => $result->admin_name,
                'chuc_vu' => $result->chuc_vu,
            ]);
            if(Session::get('admin') != NULL){
                if(Session::get('admin')['chuc_vu'] == "2"){
                    return redirect()->route('admin');
                }
                elseif(Session::get('admin')['chuc_vu'] == "3"){
                    return redirect()->route('quan-ly-sp');
                }
                elseif(Session::get('admin')['chuc_vu'] == "1"){
                    return redirect()->route('quan-ly-hd');
                }
            }
            else{
                return redirect()->back();
            }
        }
        else{
            return redirect()->back();
        }
    }

    // đăng xuất tk quản trị
    function logout(){
        Session::forget('admin');
        return redirect()->back();
    }
}
