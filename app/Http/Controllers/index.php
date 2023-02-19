<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_product;
use App\Models\product;
use App\Models\tbl_admin;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

// use Illuminate\Support\Facades\Session;

use Session;

class index extends Controller
{
   function home(){
      if(!Session::get('home')){
         return redirect()->route('dangnhap');
     }
 
      return view('frontend.home');
   }
   
   function login(){
      if(!Session::get('admin')){
         return view('frontend.login');
      }
      else{
         return redirect()->route('admin');
      }
      return view('frontend.login');
   }

   function showLoginForm(){
      if(!Session::get('home')){
         return view('frontend.dangnhap');
      }
      else{
         return redirect()->route('home');
      }
      return view('frontend.dangnhap');
   }

   function register(){
      return view('frontend.register');
   }

   function registers(Request $request){
      $user = new users([
         'name' => $request->input('name'),
         'email' => $request->input('email'),
         'password' => $request->input('password'),
      ]);
      $user->save();
      return redirect('/dangnhap');
   }

   public function dangnhap(Request $request) {
      $data = $request->all();
      $password = $data['password'];
      $user = users::where(['email' => $data['email'], 'password' => $password])->first();
      if ($user) {
         Session::put('home', [
               'email' => $user->email,
               'password' => $user->password,
               'name' => $user->name,
         ]);

         if (Session::get('home') != NULL) {
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

   function logoutuser(){ 
      Session::forget('home')  ;
      return redirect()->back();
   }

   function getlogin(Request $request){
      $data =  $request->all();
      $password = $data['admin_password'];
      $result = tbl_admin::where(['admin_email' =>  $data['admin_email'], 'admin_password' => $data['admin_password']])->first();
      // echo "<pre>";
      // print_r($result[0]['admin_password']);die;
      if($result){
         Session::put('admin', [
            'username'  => $result -> admin_email,
            'password'  => $result -> admin_password,
         ]);
         if(Session::get('admin') != NULL){
            return redirect()->route('admin');
         }
         else{
            return redirect()->back();
         }
      }
      else{
         return redirect()->back();

      }
   }

   function logout(){ 
      Session::forget('admin')  ;
      return redirect()->back();
   }
   
   function order(){
      echo "<pre>"; 
      print_r(Session::get('idProduct'));
      print_r($_POST['nameCustomer']);
      print_r($_POST['phoneCustomer']);
      print_r($_POST['country']);
      print_r($_POST['state']);
      print_r($_POST['district']);
      print_r($_POST['diachi']);
      print_r($_POST['amount']);
      print_r($_POST['ghichu']);
      print_r($_POST['type']);
      print_r($_POST['name_product']);
      print_r($_POST['original_price']);
      print_r($_POST['image']);
   }

   function order_product(Request $request){
      $product_infor = product::where(['id' => Session::get('idProduct')])->get()->toArray();
      $current_quantity = $product_infor[0]['quantity'];
      $order_quantity = $request['amount'];
      $new_quantity = $current_quantity - $order_quantity;
      if ($new_quantity < 0) {
         return redirect()->route('home')->with('mesage','Số lượng sản phẩm không đủ!');
      }
      // echo " <pre>";
      // print_r($new_quantity);die;
      product::where(['id' => Session::get('idProduct')])->update(['quantity' => $new_quantity]);
      $order_product = new order_product;
      $order_product ->name_product = $product_infor[0]['name_product'];
      $order_product ->	price =  $product_infor[0]['original_price'];
      $order_product-> image = $product_infor[0]['image'];
      $order_product ->idProduct = Session::get('idProduct');
      $order_product->nameCustomer = $request['nameCustomer'];
      $order_product->phoneCustomer = $request['phoneCustomer'];
      $order_product->country = $request['country'];
      $order_product->type = $request['type'];
      $order_product->state = $request['state'];
      $order_product->district = $request['district'];
      $order_product->diachi = $request['diachi'];
      $order_product->amount = $order_quantity; // Số lượng đặt hàng
      $order_product->ghichu = $request['ghichu'];
      $order_product ->tong = $order_quantity *  $product_infor[0]['original_price'];
      $order_product -> save();  
      return redirect()->route('home')->with('mesage','Đặt giao gas thành công');
   }
  
  

   function idProduct(){
      Session::put('idProduct',$_POST['id'] );
  
   }
   function handle_order(){
      $product = product::where(['loai' => $_POST['id']])->get()->toArray();
   //  print_r($product);die;
      $output = "";
    ////
      $sum = 0;

   foreach($product as $val){
      $output .= '
      <div class="col-3 image-product-order-all productchoose " id="'.$val['id'].'">

         <div class="activeq">
            <img class="image-product-order" src="uploads/product/'. $val['image'].'" alt="">
         </div>

         <div class="name-product-order ">
            <span>Tên sản phẩm: '. $val['name_product'].'</span>
         </div>

         <div class="price-product-order price ">
            <span>Giá sản phẩm: '. number_format($val['original_price']).' đ</span>
         </div>

      </div> '
      ;
        
   }

   echo $output;
   }

   

   
    


}
