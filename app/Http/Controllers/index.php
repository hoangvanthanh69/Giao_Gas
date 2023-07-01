<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_product;
use App\Models\product;
use App\Models\tbl_admin;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use App\Models\danh_gia;
// use Illuminate\Support\Facades\Session;
use DB;
use Session;

class index extends Controller
{
   function home(){
      if (!Session::get('home')) {
          return redirect()->route('dangnhap');
      }
      $user_id = Session::get('home')['id'];
      $order_product = order_product::where('user_id', $user_id)->get()->toArray();
      $phoneCustomer = null;
      $diachi = null;
      $country = null;
      $state = null;
      $district = null;
      if (!empty($order_product)) {
         usort($order_product, function($a, $b) {
            return strcmp($b['created_at'], $a['created_at']);
        });
         $phoneCustomer = $order_product[0]['phoneCustomer'];
         $diachi = $order_product[0]['diachi'];
         $country = $order_product[0]['country'];
         $state = $order_product[0]['state'];
         $district = $order_product[0]['district'];

      } 
      elseif (empty($order_product) && Session::has('phoneCustomer', 'diachi', 'country', 'state', 'district')) {
         $phoneCustomer = Session::get('phoneCustomer');
         $diachi = Session::get('diachi');
         $country = Session::get('country');
         $state = Session::get('state');
         $district = Session::get('district');

      }
      $users = users::find($user_id);
      $counts_processing = order_product::where('user_id', $user_id)->count();
      return view('frontend.home', ['order_product' => $order_product, 'phoneCustomer' => $phoneCustomer, 'diachi' => $diachi, 
      'country' => $country, 'state' => $state, 'district' => $district, 'users' => $users,'counts_processing' => $counts_processing,
      ]);
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

   function dangnhap(Request $request) {
      $data = $request->all();
      $password = $data['password'];
      $user = users::where(['email' => $data['email'], 'password' => $password])->first();
      if ($user) {
         Session::put('home', [
               'id' => $user->id,
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
      $data = $request->all();
      $password = $data['admin_password'];
      $result = tbl_admin::where(['admin_email' => $data['admin_email'], 'admin_password' => $data['admin_password']])->first();
      if($result){
         Session::put('admin_img', $result->image_staff);
         Session::put('admin_name', $result->admin_name); 
         Session::put('admin', [
            'admin_id' => $result->admin_id,
            'username'  => $result->admin_email,
            'password'  => $result->admin_password,
            'admin_name' => $result->admin_name,
            'chuc_vu' => $result->chuc_vu,
         ]);
         if(Session::get('admin') != NULL){
            if(Session::get('admin')['chuc_vu'] == "2"){
               return redirect()->route('admin');

            }
            else{
               return redirect()->route('quan-ly-hd');

            }
          } else {
              return redirect()->back();
          }
      } else {
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
      $user_id = Session::get('home')['id'];
      $order_product = new order_product;
      Session::put('phoneCustomer', $request['phoneCustomer']);
      Session::put('country', $request['country']);
      Session::put('diachi', $request['diachi']);
      Session::put('state', $request['state']);
      Session::put('district', $request['district']);
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
      $order_product->order_code = uniqid(); // Tạo mã đơn hàng tự động
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
      if(empty($request['ghichu'])){
         $order_product->ghichu = 'null';
      }else {
         $order_product->ghichu =$request['ghichu'];
      }
      $order_product ->tong = $order_quantity *  $product_infor[0]['original_price'];
      // $order_product -> save();  
      $order_product->status = 1;
      $order_product->user_id = $user_id;
      if(isset($admin_name)){
         $order_product->admin_name = $admin_name;
     } else {
         $order_product->admin_name = 'Chưa có người giao';
     }
      $order_product->save();
      return redirect()->route('home',)->with('success', 'Đặt giao gas thành công');
   }


   // hủy đơn hàng của khách hàng
   function cancelOrder($id) {
      $order_product = order_product::find($id);
      if ($order_product) {
            $order_product->status = 4; // đã hủy
            $order_product->save();
          return redirect()->route('order-history')->with('message', 'Đã hủy đơn hàng thành công');
      } else {
            return redirect()->route('order-history')->with('message', 'Không tìm thấy đơn hàng');
      }
  }
 
   function idProduct(){
      Session::put('idProduct',$_POST['id'] );
  
   }

   function handle_order(){
      $product = product::where(['loai' => $_POST['id']])->get()->toArray();
      $bestsellerIds = order_product::select('idProduct', DB::raw('sum(amount) as total_amount'))->groupBy('idProduct')
         ->havingRaw('COUNT(*) >= 2')
         ->orderByDesc('total_amount')
         ->pluck('idProduct')
         ->toArray();
      $output = "";
   
      foreach ($product as $val) {
         $isBestseller = in_array($val['id'], $bestsellerIds);
         $output .= '
            <div class="col-3 image-product-order-all productchoose" id="'.$val['id'].'">
               <div class="activeq">
                  <img class="image-product-order" src="uploads/product/'. $val['image'].'" alt="">
               </div>
   
               <div class="name-product-order">
                  Tên sản phẩm:
                  <span class="name_product name-product-span"> '. $val['name_product'].'</span>
               </div>
   
               <div class="price-product-order price" id="price">
                  Giá sản phẩm: 
                  <span class="gia price-product-order-span">'. number_format($val['original_price']).' đ</span>
               </div>'
               ;
   
         if ($isBestseller) {
            $output .= '
               <div class="home-product-item-selling">
                  <span class="">Bán chạy</span>
               </div>';
         }
   
         if ($val['quantity'] == 0) {
            $output .= '
               <div class="home-product-item-sale-off">
                  <span class="home-product-item-sale-off-label">Hết gas</span>
               </div>';
         }
   
         $output .= '</div>';
      }
    
      echo $output;
   }

   //
   function order_history(){
      $user_id = Session::get('home')['id'];
      $order_product = order_product::orderByDesc('created_at')->where(['user_id' => $user_id])->get()->toArray(); 
      $status = isset($_GET['status']) ? $_GET['status'] : 'all';
      $users = users::find($user_id);
      $counts_processing = order_product::where('user_id', $user_id)->where('status', 1)->count();
      $counts_delivery = order_product::where('user_id', $user_id)->where('status', 2)->count();
      $counts_all = order_product::where('user_id', $user_id)->count();
      $counts_complete = order_product::where('user_id', $user_id)->where('status', 3)->count();
      $counts_cancel = order_product::where('user_id', $user_id)->where('status', 4)->count();
      return view('frontend.order_history',['order_product' => $order_product, 'status' => $status,
         'counts_processing' => $counts_processing, 'counts_all' => $counts_all, 'counts_delivery' => $counts_delivery,
         'counts_complete' => $counts_complete, 'counts_cancel' => $counts_cancel
      ]);
   }

   // thông tin đơn hàng của khách hàng
   function thong_tin_don_hang(Request $request, $id){
      if(!Session::get('home')){
          return redirect()->route('dangnhap');
      }
      $order_product = order_product::find($id);
      $delivery_info = tbl_admin::where('admin_name', $order_product->admin_name)->first();
      if($delivery_info) {
         $staff_id = $delivery_info->id;
      } else {
         $staff_id = null;
      }
      $user_id = $order_product->user_id;
      $danh_gia = danh_gia::where('staff_id', $staff_id)
         ->where('user_id', $user_id)
         ->orderBy('created_at', 'desc')
         ->first();
      $ratings = danh_gia::where('staff_id', $staff_id)->pluck('rating');
      $total_stars = $ratings->sum();
      $count_ratings = count($ratings);
      $average_rating = $count_ratings > 0 ? $total_stars / $count_ratings : 0;
      return view('frontend.thong_tin_don_hang', [
         'order_product' => $order_product,
         'delivery_info' => $delivery_info,
         'danh_gia' => $danh_gia,
         'average_rating' => $average_rating,
         'staff_id' => $staff_id,
      ]);
   }
    
  
   function danh_gia_giao_hangs(Request $request, $id){
      $user_id = Session::get('home')['id'];
      $staff_id = $request->input('staff_id');
      $order_id = $request->input('order_id');
      $Comment = $request->input('Comment');
      $rating = $request->input('rating');
      $new_rating = new danh_gia;
      $new_rating->staff_id = $staff_id;
      $new_rating->order_id = $order_id;
      $new_rating->user_id = $user_id;
      // $new_rating->Comment = $Comment;
      if(empty($request['Comment'])){
         $new_rating->Comment = 'null';
      }else {
         $new_rating->Comment =$request['Comment'];
      }
      $new_rating->rating = $rating; 
      $new_rating->save();
      return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá');
   }

   // cap nhat anh cho khach hang
   function update_image_user(Request $request, $id) {
      $user = users::find($id);
      if ($request->hasFile('img')) {
          $image = $request->file('img');
          $name = time() . '.' . $image->getClientOriginalExtension();
          $destinationPath = public_path('/uploads/users');
          $image->move($destinationPath, $name);
          $user->img = $name;
          $user->save();
      }
      return redirect()->back()->with('success', 'Cập nhật ảnh thành công');
   }

   // cập nhật mật khẩu cho khách hàng
   function update_password_customer(Request $request, $id) {
      $user = users::find($id);
      if ($request->old_password !== $user->password) {
         return redirect()->back();
      }
      $user->password = ($request->new_password);
      $user->save();
      return redirect()->back()->with('success', 'Cập nhật mật khẩu thành công');
   }
}
