<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_product;
use App\Models\product;
use App\Models\tbl_admin;

use Session;

class index extends Controller
{
   function home(){
 
      return view('frontend.home');
   }
   

   function login(){
      if(!Session::get('admin')){
         return view('frontend.login');

     }else{
         return redirect()->route('admin');
     }
      return view('frontend.login');
   }

   function getlogin(Request $request){
  

      $data =  $request->all();
    
      // $admin_email = $request->admin_email;
      // $admin_password = $request->admin_password;
      // $tbl_admin = new tbl_admin;
      $password = $data['admin_password'];
      $result = tbl_admin::where(['admin_email' =>  $data['admin_email']])->get()->toArray();
      // echo "<pre>";
      // print_r($result[0]['admin_password']);die;
      if(isset($result) && $result != NULL){
         if($password === $result[0]['admin_password'] ){
            Session::put('admin', [
               'username'  => $result[0]['admin_email'],
               // 'email'  => $data_admin[0]['email'],
               'password'  => $result[0]['admin_password'],
               // 'role'  => $data_admin[0]['role'],
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
      $order_product = new order_product;
      $product_infor = product::where(['id' => Session::get('idProduct')])->get()->toArray();
      // print_r($product_infor);die;

      // print_r($product_infor[0]['name_product']);die;
      // print_r($request['nameCustomer']);
      $order_product ->name_product = $product_infor[0]['name_product'];
      $order_product ->	price =  $product_infor[0]['original_price'];
      $order_product-> image = $product_infor[0]['image'];
      print_r($product_infor[0]['image']);

      $order_product ->idProduct = Session::get('idProduct');
      $order_product->nameCustomer = $request['nameCustomer'];
      $order_product->phoneCustomer = $request['phoneCustomer'];
      $order_product->country = $request['country'];
      $order_product->type = $request['type'];
      $order_product->state = $request['state'];
      $order_product->district = $request['district'];
      $order_product->diachi = $request['diachi'];
      $order_product->amount = $request['amount'];
      $order_product->ghichu = $request['ghichu'];
      $order_product ->tong = $request['amount'] *  $product_infor[0]['original_price'];
      // print_r($request['amount'] *  $product_infor[0]['original_price']); die;
      $order_product -> save();  
         echo " <pre>";

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
