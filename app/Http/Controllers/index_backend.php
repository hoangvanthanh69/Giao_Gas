<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\add_staff;
use App\Models\order_product;
use App\Models\tbl_admin;
use App\Models\users;
use App\Models\danh_gia;
use App\Models\add_order;
use App\Models\tbl_discount;
use Illuminate\Pagination\LengthAwarePaginator;

use Session;
use DB;
use Illuminate\Support\Facades\Auth;
use PDF;


class index_backend extends Controller
{
    function home(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $product = product::get()->toArray();
        $staff = add_staff::get()->toArray();
        $order_product = order_product::get()->toArray(); 
        $tbl_admin = tbl_admin::get()->toArray();
        $data = $request->all();
        $count_product = product::count();
        $count_staff = add_staff::count();
        $data_original_price=product::sum('original_price');
        $count_product1 = product::where('loai','=',1)->count();
        $count_product2 = product::where('loai','=',2)->count();
        $count_staff_chuvu1 = add_staff::where('chuc_vu','=',1)->count();
        $count_staff_chuvu2 = add_staff::where('chuc_vu','=',2)->count();
        $count_staff_chuvu3 = add_staff::where('chuc_vu','=',3)->count();
        $tong_gia=order_product::where('status','=',3)->sum('tong');
        $product_all=product::sum('quantity');
        $count_order = order_product::count();
        $data_price = product::select(DB::raw('sum(quantity * price) as total')) ->first()->total;
        $data_price1 = product::where('loai','=',1)->select(DB::raw('sum(quantity * price) as total')) ->first()->total;
        $data_price2 = product::where('loai','=',2)->select(DB::raw('sum(quantity * price) as total')) ->first()->total;
        $orders = order_product::all();
        $productsData = [];
        foreach ($orders as $order) {
            $infor_gas = json_decode($order->infor_gas, true);
            if ($infor_gas) {
                foreach ($infor_gas as $infor) {
                    $product = product::find($infor['product_id']);
                    if ($product) {
                        $productInfo = [
                            'product_id' => $infor['product_id'],
                            'product_name' => $infor['product_name'],
                            'quantity' => $infor['quantity'],
                        ];
                        if (!isset($productsData[$infor['product_id']])) {
                            $productsData[$infor['product_id']] = $productInfo;
                        } else {
                            $productsData[$infor['product_id']]['quantity'] += $productInfo['quantity'];
                        }
                    }
                }
            }
        }
        $popularProducts = [];
        foreach ($productsData as $product_id => $productInfo) {
            if ($productInfo['quantity'] > 2) {
                $popularProducts[$product_id] = $productInfo;
            }
        }
        // $loyal_customer = order_product::select('nameCustomer', 'phoneCustomer', DB::raw('count(distinct id) as total_amounts'))
        // ->groupBy('nameCustomer','phoneCustomer')->havingRaw('COUNT(distinct id) >= 3')->orderByDesc('total_amounts')->get();
        // // print_r($bestseller); die;
        // print_r($tong_gia);
        return view('backend.admin',['product'=> $product , 'staff' => $staff , 'order_product' => $order_product, 'tbl_admin' => $tbl_admin], 
        compact('count_product', 'count_staff', 'count_order','data_price', 'data_original_price', 'count_product1', 
        'count_product2', 'data_price1', 'data_price2', 'count_staff_chuvu1', 'count_staff_chuvu2', 'tong_gia', 
        'product_all','count_staff_chuvu3', 'popularProducts'));
    }

    function chitiet_hd(Request $request, $id){
        $order_product = order_product::find($id);
        //    echo " <pre>";
        //    print_r($staff);
        if (!$order_product) {
            return redirect()->route('quan_ly_hd')->with('error', 'Không tìm thấy đơn hàng.');
        }
        $infor_gas = json_decode($order_product['infor_gas'], true);
        $products = [];
        if ($infor_gas) {
            foreach ($infor_gas as $infor) {
                $product = product::find($infor['product_id']);
                if ($product) {
                    $products[] = [
                        'product' => $product,
                        'product_name' => $infor['product_name'],
                        'product_price' => $infor['product_price'],
                        'quantity' => $infor['quantity'],
                    ];
                }
            }
        }
        return view('backend.chitiet_hd' , ['order_product' => $order_product, 'products' => $products]);
    }

    function chitiet(Request $request, $id){
        $order_product = order_product::find($id);
        return view('backend.chitiet' , ['order_product' => $order_product]);
    }

    function edit_staff($id){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $staff = add_staff::find($id);
        //    echo " <pre>";
        //    print_r($staff);
        return view('backend.edit_staff' , ['staff' => $staff]);
    }
    
    function update_staff(Request $request, $id){
        $staff = add_staff::find($id);
        $staff->last_name = $request->last_name;
        $staff->birth = $request->birth;
        $staff->chuc_vu = $request->chuc_vu;
        $staff->taikhoan = $request->taikhoan;
        $staff->dia_chi = $request->dia_chi;
        $staff->date_input = $request->date_input;
        $staff->phone = $request->phone;
        $staff->luong = $request->luong;
        $get_image = $request->image_staff;
        if($get_image){
            // Bỏ hình ảnh cũ
            $path_unlink = 'uploads/staff/'.$staff->image_staff;
            if($staff->image_staff && file_exists($path_unlink)){
                unlink($path_unlink);
            }
            // Thêm mới
            $path = 'uploads/staff/';
            $get_name_image = $get_image-> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $staff->image_staff = $new_image;
        }
        $staff->save();
        return redirect()->route('quan-ly-nv');
    }

    // trang thêm nv
    function add_staff(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        return view('backend.add_staff');
    }

    // thêm nv
    function staff_add(Request $request){
        $data =  $request->all();
        $add_staff = new add_staff;
        $add_staff->last_name =  $data['last_name'];
        $add_staff->birth =  $data['birth'];
        $add_staff->chuc_vu =  $data['chuc_vu'];
        $add_staff->dia_chi =  $data['dia_chi'];
        $add_staff->taikhoan =  $data['taikhoan'];
        $add_staff->date_input =  $data['date_input'];
        $add_staff->phone =  $data['phone'];
        $add_staff->luong =  $data['luong'];
        $add_staff->status_add = false;
        $image = $request->file('image_staff');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/staff');
        $image->move($destinationPath, $name);
        $add_staff->image_staff = $name;
        // print_r($get_image);die;
        $add_staff -> save();  
        return redirect()->route('quan-ly-nv');
    }

    // xóa nv
    function delete_staff($id){
        $staff_add = add_staff::find($id);
        $staff_add->delete();
        return redirect()->route('quan-ly-nv')->with('mesage','Xóa nhân viên thành công');

    }

    function delete_client($id){
        $order_product = order_product::find($id);
        $order_product->delete();
        return redirect()->route('quan-ly-hd')->with('mesage','Xóa đơn hàng thành công');;

    }

    // quản lý nhân viên 
    function quan_ly_nv(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $staff = add_staff::paginate(6);
        // $staff = add_staff::get()->toArray();
        return view('backend.quan_ly_nv',['staff' => $staff]);
    }

    // quản lý hóa đơn
    function quan_ly_hd() {
        if (!Session::get('admin')) {
            return redirect()->route('login');
        }
    
        $admin_name = Session::get('admin')['admin_name'];
        $chuc_vu = Session::get('admin')['chuc_vu'];
        if ($chuc_vu == '2') {
            $order_product = order_product::orderByDesc('created_at')->get()->toArray();
        } else {
            $order_product = order_product::where(['admin_name' =>$admin_name])->orderByDesc('created_at')->get()->toArray();
        }
        $filters = array(
            'status' => isset($_GET['status']) ? $_GET['status'] : 'all',
            'loai' => isset($_GET['loai']) ? $_GET['loai'] : 'all'
        );
    
        return view('backend.quan_ly_hd', compact('order_product', 'filters'));
    }

    // thống kê chi tiết đơn hàng
    function thong_ke_chi_tiet_dh(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $data =  $request->all();
        $count_order = order_product::count();
        $count_order_delivered = order_product::where('status','=',3)->count();
        $count_order_delivery = order_product::where('status','=',2)->count();
        $count_order_processing = order_product::where('status','=',1)->count();
        $count_order_canceled = order_product::where('status','=',4)->count();
        return view('backend.thong_ke_chi_tiet_dh', compact('count_order', 'count_order_delivered',
        'count_order_delivery','count_order_processing', 'count_order_canceled'));
    }

    // in đơn hàng
    function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    function print_order_convert($checkout_code){
        $order_product = order_product::where('id', $checkout_code)->first();
        $infor_gas = json_decode($order_product->infor_gas, true);
        $output = '';
        $output .= '
            <style>
                body{
                    font-family: Dejavu Sans;
                }
                .table-thead{
                    margin-top: 10px;
                    border: 1px solid #000;
                }
                .table-thead th{
                    border: 1px solid #000;
                }
                .tbody-tr-td td{
                    width: 180px;
                    border: 1px solid #000;
                    text-align: center;
                }
                .thead-tr-name-table th{
                    width: 100px;
                    border: 1px solid #000;
                }
                .receipt-h3{
                    text-align: center;
                }
                td.product_name{
                    width: 260px;
                }
                td.quantity{
                    width: 80px;
                }
                .total-payment-price{
                    width: 150px;
                    text-align: center;
                }
            </style>
            <div class="receipt-h3">
                <h2>Gas Tech</h2>
                <span>Nhanh chóng - An toàn - Chất lượng - Hiệu quả</span>
                <p>SĐT 0837641469</p>
            </div>
            
            <h3 class="receipt-h3">HÓA ĐƠN THANH TOÁN</h3>
            <div class="infor-customer">
                <label class="name-add-product-all col-4" for="">Khách Hàng:</label>
                <span>'.$order_product['nameCustomer'].'</span>
            </div>

            <div class="">
                <label class="name-add-product-all col-4" for="">Địa chỉ:</label>
                <span>'.$order_product['diachi'].', '.$order_product['district'].', '.$order_product['state'].', '.$order_product['country'].'</span>
            </div>

            <div class="">
                <label class="name-add-product-all col-3" for="">Số điện thoại:</label>
                <span>'.$order_product['phoneCustomer'].'</span>
            </div>
            <div class="">
                <label class="name-add-product-all col-3" for="">Ngày đặt:</label>
                <span>'.$order_product['created_at'].'</span>
            </div>
            <div class="">
                <label class="name-add-product-all col-3" for="">Mã ĐH:</label>
                <span>'.$order_product['order_code'].'</span>
            </div>
            
            <table class="table-thead">
                <thead>
                    <tr class="thead-tr-name-table">
                        <th>Tên sản phẩm</th>
                        <th>SL</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                    
                <tbody class="infor">';
            if (!empty($infor_gas)) {
                foreach ($infor_gas as $infor) {
                    $product = product::find($infor['product_id']);
                    if ($product) {
                        $output .= '
                            <tr class="tbody-tr-td">
                                <td class="product_name">'.$infor['product_name'].'</td>
                                <td class="quantity">'.$infor['quantity'].'</td>
                                <td>'.number_format($infor['product_price']).' VNĐ</td>';
                    }
                }
                $output .= '<div class="total-payment-price"><strong>'.number_format($order_product['tong']).' VNĐ</strong></div>
                </tr>';
            }
        $output .= '</tbody>
                    </table>
                    <p class="receipt-h3">Gas Tech xin chân thành cảm ơn quý khách,</p>
                    <p class="receipt-h3">Hẹn gặp lại!</p>';

        return $output;
    }

    // tìm kiếm nhân viên
    function searchOrder(Request $request){
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $staff = add_staff::where('id', 'LIKE', "%$search%")->orWhere('last_name', 'LIKE', "%$search%")->paginate(6);
            if(empty($staff->items())){
                return back()->with('mesages', 'Không tìm thấy kết quả');
            } else {
                return view('backend.quan_ly_nv', ['staff' => $staff, 'search' => $search]);
            }
        } else {
            return redirect()->back();
        }
    }

    // tài khoản admin
    function quan_ly_tk_admin(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_admin = tbl_admin::get()->toArray();
        $staff = add_staff::get()->toArray();
        foreach ($tbl_admin as &$tbl_admins) {
            $admin_name = $tbl_admins['admin_name'];
            $order_count = order_product::where('admin_name', $admin_name)->count();
            $tbl_admins['order_count'] = $order_count;
        }
        return view('backend.quan_ly_tk_admin', ['tbl_admin' => $tbl_admin, 'staff' =>$staff]);
    }

    // thêm tài khoản admin
    function add_account_admin(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_admin = tbl_admin::get()->toArray();
        $staff = add_staff::get()->toArray();
        return view('backend.add_account_admin', ['tbl_admin' => $tbl_admin, 'staff' =>$staff]);
    }

    // trạng thái đơn hàng của admin
    function status_admin(Request $request, $id) {
        $order_product = order_product::find($id);
        if ($order_product) {
            if ($order_product->status != 3) {
                $order_product->status = $request->input('status');
                $order_product->save();
            }
            return redirect()->back();
        }
        else {
            return redirect()->back();
        }
    }

    // quản lý giao hàng
    function quan_ly_giao_hang(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $status = isset($_POST['status']) ? $_POST['status'] : 'all';
        if ($status == '1') {
            $order_product = order_product::where('status', 1)->orderByDesc('created_at')->get()->toArray(); 
        } else if ($status == '2') {
            $order_product = order_product::where('status', 2)->orderByDesc('created_at')->get()->toArray(); 
        } else {
            $order_product = order_product::whereIn('status', [1, 2])->orderByDesc('created_at')->get()->toArray(); 
        }
        foreach ($order_product as &$order) {
            $infor_gas = json_decode($order['infor_gas'], true);
            $products = [];
            if ($infor_gas) {
                foreach ($infor_gas as $infor) {
                    $product = product::find($infor['product_id']);
                    if ($product) {
                        $products[] = [
                            'product' => $product,
                            'product_name' => $infor['product_name'],
                            'product_price' => $infor['product_price'],
                            'quantity' => $infor['quantity'],
                        ];
                    }
                }
            }
            $order['products'] = $products;
        }
        $tbl_admin = tbl_admin::get();
        $admin_name = session()->get('admin_name');
        $product_id = session()->get('product_id');
        return view('backend.quan_ly_giao_hang', ['order_product' => $order_product, 'status' => $status, 'tbl_admin' => $tbl_admin,
        'admin_name' => $admin_name,]);
    }
    
    function quan_ly_giao_hangs(Request $request){
        $product_id = $request->input('id');
        $id = $request->input('id');
        $admin_id = $request->input('admin_id');
        $admin_name = $request->input('admin_name');
        $order_product = DB::table('order_product')->where('id',$id)->update(['admin_name' => $admin_name]);
        return redirect()->back();
    }
    
    //xoa tai khoan admin
    function delete_account($admin_id){
        $tbl_admin = tbl_admin::find($admin_id);
        $add_staff = add_staff::where('taikhoan', $tbl_admin->admin_email)->first();
        if($add_staff) {
            $add_staff->status_add = false;
            $add_staff->save();
        }
        $tbl_admin->delete();
        return redirect()->route('quan-ly-tk-admin')->with('success','Xóa tài khoản thành công');
    }
    
    // thêm tài khoản admin
    function add_account(Request $request, $id){
        $staff = add_staff::find($id);
        $admin = new tbl_admin;
        $admin->admin_name = $staff->last_name;
        $admin->admin_password = $request->password;
        $admin->admin_email = $staff->taikhoan;
        $admin->chuc_vu = $staff->chuc_vu;

        $admin->image_staff = $staff->image_staff;
        $admin->save();
        $staff->status_add = true;
        $staff->save();
        return redirect()->route('quan-ly-tk-admin');
    }

    // giao diện chỉnh sửa tài khoản admin
    function edit_account_admin($id){
        $account_admin = tbl_admin::find($id);
        return view('backend.edit_account_admin', ['account_admin' => $account_admin]);
    }
    function update_account_admin(Request $request, $id){
        $account_admin = tbl_admin::find($id);
        $account_admin -> admin_name = $request -> admin_name;
        $account_admin -> admin_email = $request -> admin_email;
        $account_admin -> admin_password = $request -> admin_password;
        $account_admin -> save();
        return redirect()->route('quan-ly-tk-admin');
    }

    // quan ly tk khach hang
    function quan_ly_tk_user(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $users = users::orderByDesc('id')->get()->toArray();
        $order_product = order_product::orderByDesc('id')->get()->toArray();
        foreach($users as &$user){
            $order_count = order_product::where('user_id', $user['id'])->count();
            $user['order_count'] = $order_count;
        }
        return view('backend.quan_ly_tk_user', ['users'=>$users, 'order_product'=>$order_product]);
    }
    
    // xoas tai khoan khach hang
    function delete_account_users($id){
        $users = users::find($id);
        $users->delete();
        return redirect()->route('quan-ly-tk-user')->with(['message'=> 'xóa thành công']);
    }

    // chi tiet doanh thu
    function chi_tiet_doanh_thu(request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $dates = now()->setTimezone('Asia/Ho_Chi_Minh');;
        $total_price_today = order_product::where('status', '=', 3)->whereDate('created_at', '=', $dates)->sum('tong');
        // print_r($total_price_today);die;
        $date = $request->input('date', date('d-m-Y'));
        $tong_gia_ngay = order_product::where('status', '=', 3)->whereDate('created_at', '=', $date)->sum('tong');
        $month = $request->input('month', date('m-Y'));
        $total_price_month = order_product::where('status', '=', 3)->whereYear('created_at', '=', date('Y', strtotime($month)))
            ->whereMonth('created_at', '=', date('m', strtotime($month)))->sum('tong');
        $year = $request->input('year', date('Y'));
        $total_price_year = order_product::where('status', '=', 3)->whereYear ('created_at', '=',$year)->sum('tong');
        $start_date = $request->input('start_date', date('d-m-Y'));
        $end_date = $request->input('end_date', date('d-m-Y'));
        $total_revenue = order_product::where('status', '=', 3)->whereBetween('created_at', [$start_date, $end_date])->sum('tong');
        return view('backend.chi_tiet_doanh_thu',['total_price_today' => $total_price_today, 'dates'=> $dates,], 
        compact(
        'tong_gia_ngay', 'date','year', 'total_price_year', 'start_date', 'end_date', 'total_revenue', 'month', 'total_price_month'));
    }

    // hủy giao hàng cho nhân viên
    function cancelDelivery($id) {
        $order_product = order_product::where('id', $id)->update(['admin_name' => 'Người giao hủy']);
        return redirect()->back();
    }

    //hien thi danh gia giao hang
    function danh_gia_giao_hang(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_admin = tbl_admin::get();
        foreach($tbl_admin as $key => $val) {
            $danh_gia = danh_gia::where('staff_id', $val->id)->first();
            $ratings = danh_gia::where('staff_id', $val->id)->pluck('rating');
            $total_stars = $ratings->sum();
            $count_ratings = count($ratings);
            $average_rating = $count_ratings > 0 ? round($total_stars / $count_ratings, 2) : 0;
            $val->ratings = $average_rating;
        }
        return view('backend.danh_gia_giao_hang', ['tbl_admin' => $tbl_admin,]);
    }

    //tìm kiếm hóa đơn
    function search_hd(Request $request) {
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $order_product = order_product::where('nameCustomer', 'LIKE', "%$search%")
                ->orWhere('order_code', 'LIKE', "%$search%")
                ->get();
            if ($order_product->isEmpty()) {
                return back()->with('mesages', 'Không tìm thấy kết quả');
            } else {
                $filters = array(
                    'status' => isset($_GET['status']) ? $_GET['status'] : 'all',
                    'loai' => isset($_GET['loai']) ? $_GET['loai'] : 'all'
                );
    
                return view('backend.quan_ly_hd', compact('order_product', 'filters', 'search'));
            }
        } else {
            return redirect()->back();
        }
    }
    
    // hiển thi giao diện đặt hàng qua sdt
    function order_phone() {
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $products = product::get();
        return view('backend.order_phone', ['products' => $products]);
    }
    
    // xử lý đặt hàng qua số đt
    function add_orders(Request $request) {
        $inforGas = $request->input('infor_gas');
        $data = [];
        $totalPrice = 0;
        foreach ($inforGas as $productId => $quantity) {
            if ($quantity) {
                $product = Product::find($productId);
                if ($product) {
                $price = $product->original_price;
                $totalPrice += $price * $quantity;
                $data[] = [
                    'product_id' => $productId,
                    'product_name' => $product->name_product,
                    'product_price' => $price,
                    'quantity' => $quantity,
                ];
                }
            }
        }

        $jsonData = json_encode($data);

        $order = new order_product;
        $order->infor_gas = $jsonData;
        Session::put('phoneCustomer', $request['phoneCustomer']);
        Session::put('country', $request['country']);
        Session::put('diachi', $request['diachi']);
        Session::put('state', $request['state']);
        Session::put('district', $request['district']);
        $order->nameCustomer = $request['nameCustomer'];
        $order->phoneCustomer = $request['phoneCustomer'];
        $order->country = $request['country'];
        $order->state = $request['state'];
        $order->district = $request['district'];
        $order->diachi = $request['diachi'];
        $order->loai = $request['loai'];
        $user_id = Session::get('home')['id'];
        $order->user_id = $user_id;
        if (empty($request['ghichu'])) {
            $order->ghichu = 'null';
        } else {
            $order->ghichu = $request['ghichu'];
        }
        $order->status = 1;
        if (isset($admin_name)) {
            $order->admin_name = $admin_name;
        } else {
            $order->admin_name = 'Chưa có người giao';
        }
        $order->order_code = uniqid();
        $order->tong = $totalPrice;
        $order->save();
        return redirect()->route('order_phone')->with('success', 'Đặt giao gas thành công');
    }

    // kiểm tra khách hàng thông qua số điện thoại
    function checkCustomer(Request $request){
        $phoneNumber = $request->input('phone');
        $customer = order_product::where('phoneCustomer', $phoneNumber)->first();
        if ($customer) {
            $customerName = $customer->nameCustomer;
            $country = $customer->country;
            $state = $customer->state;
            $district = $customer->district;
            $diachi = $customer->diachi;
            return response()->json([
                'success' => true,
                'customerName' => $customerName,
                'country' => $country,
                'state' => $state,
                'district' => $district,
                'diachi' => $diachi,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
