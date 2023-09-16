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
use App\Models\tbl_comment;
use Illuminate\Pagination\LengthAwarePaginator;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;
use PDF;
use Mail;
use App\Exports\ExcelExports;
use App\Exports\ExcelExportsStaff;
use Excel;

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
        return view('backend.admin',['product'=> $product, 'staff' => $staff, 'order_product' => $order_product, 'tbl_admin' => $tbl_admin], 
            compact('count_product', 'count_staff', 'count_order','data_price',
                'data_original_price', 'count_product1', 'count_product2', 
                'data_price1', 'data_price2', 'count_staff_chuvu1', 'count_staff_chuvu2', 'tong_gia', 
                'product_all','count_staff_chuvu3', 'popularProducts'
            )
        );
    }

    function chitiet_hd(Request $request, $id){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
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
    
    function delete_client($id){
        $order_product = order_product::find($id);
        $order_product->delete();
        return redirect()->route('quan-ly-hd')->with('mesage','Xóa đơn hàng thành công');;
    }

    // quản lý hóa đơn
    function quan_ly_hd(Request $request) {
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
        $filters = [
            'status' => $request->input('status', 'all'),
            'loai' => $request->input('loai', 'all')
        ];
        $search = $request->input('search');
        // dd($filters);
        return view('backend.quan_ly_hd', compact('order_product', 'filters', 'search'));
    }

    //lọc đơn hàng theo tên a-z, z-a
    function sort_order(Request $request){
        $query = order_product::query();
        $sortOrder = $request->input('sort_order', 'asc');
        if ($sortOrder == 'asc') {
            $query->orderBy('nameCustomer', 'asc'); 
        } else {
            $query->orderBy('nameCustomer', 'desc');
        }
        $filters = [
            'status' => $request->input('status', 'all'),
            'loai' => $request->input('loai', 'all'),
            'sort_order' => $sortOrder,
        ];
        $search = $request->input('search');
        $order_product = $query->get()->toArray();
        return view('backend.quan_ly_hd', compact('order_product', 'filters', 'search'));
    }

    //lọc đơn hàng theo ngày gần nhất và xa nhất
    function data_created_at(Request $request){
        $query = order_product::query();
        $dateOrder = $request->input('data_created_at', 'near');
        if ($dateOrder == 'near') {
            $query->orderByDesc('created_at');
        } else {
            $query->orderBy('created_at');
        }
        $order_product = $query->get()->toArray();
        $filters = [
            'status' => $request->input('status', 'all'),
            'loai' => $request->input('loai', 'all'),
            'dateOrder' => $dateOrder,
        ];
        $search = $request->input('search');
        $order_product = $query->get()->toArray();
        return view('backend.quan_ly_hd', compact('order_product', 'filters', 'search'));
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
            'count_order_delivery','count_order_processing', 'count_order_canceled')
        );
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
    function quan_ly_giao_hang(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $selectedDistrict = $request->input('district', '');
        $query = order_product::orderByDesc('created_at');
        if ($selectedDistrict) {
            $query->where('district', $selectedDistrict);
        }
        // Lấy danh sách quận huyện từ cơ sở dữ liệu
        $districts = order_product::pluck('district')->unique();
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
        'admin_name' => $admin_name, 'districts' => $districts, 'selectedDistrict' => $selectedDistrict,]);
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

    function quan_ly_tk_user(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $filter = $request->input('filter');
        $users = users::orderByDesc('id')->get();
        $combinedData = [];
        
        foreach ($users as $user) {
            $orderProductQuery = order_product::where('user_id', $user->id);
            if ($filter > 0) {
                $startDate = now()->subMonths($filter)->startOfMonth();
                $endDate = now()->endOfMonth();
                $orderProductQuery->whereBetween('created_at', [$startDate, $endDate]);
            }
            $orderProductCount = $orderProductQuery->count();
            $orderProductSum = $orderProductQuery->sum('tong');
            $combinedData[] = [
                'user' => $user,
                // 'phoneCustomer' => $orderProductCount > 0 ? $orderProductQuery->first()->phoneCustomer : '',
                'district' => $orderProductCount > 0 ? $orderProductQuery->first()->district : '',
                'diachi' => $orderProductCount > 0 ? $orderProductQuery->first()->diachi : '',
                'state' => $orderProductCount > 0 ? $orderProductQuery->first()->state : '',
                'order_count' => $orderProductCount,
                'orderProductSum' => $orderProductSum,
            ];
        }

        // cho khách hàng đặt qua số điện thoại có user_id == null
        $order_products_null_user = order_product::where('user_id', 'NULL')->get()->toArray();
        // print_r($orderProductsNullUser);die;
        return view('backend.quan_ly_tk_user', ['combinedData' => $combinedData, 'filter' => $filter,
        'order_products_null_user' => $order_products_null_user,]);
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
        $total_price_month = order_product::where('status', '=', 3)
            ->whereYear('created_at', '=', date('Y', strtotime($month)))
            ->whereMonth('created_at', '=', date('m', strtotime($month)))->sum('tong');
        $year = $request->input('year', date('Y'));
        $total_price_year = order_product::where('status', '=', 3)->whereYear('created_at', '=',$year)->sum('tong');
        $start_date = $request->input('start_date', date('d-m-Y'));
        $end_date = $request->input('end_date', date('d-m-Y'));
        $total_revenue = order_product::where('status', '=', 3)->whereBetween('created_at', [$start_date, $end_date])->sum('tong');
        return view('backend.chi_tiet_doanh_thu',['total_price_today' => $total_price_today, 'dates'=> $dates,], 
            compact('tong_gia_ngay', 'date','year', 'total_price_year', 'start_date',
                'end_date', 'total_revenue', 'month', 'total_price_month'
            )
        );
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
        $tbl_discount = tbl_discount::get();
        $ma_giam = session()->get('ma_giam');
        $ma_giam = session()->get('gia_tri');
        return view('backend.order_phone', ['products' => $products, 'tbl_discount' => $tbl_discount, 'ma_giam' => $ma_giam]);
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
                    // Kiểm tra số lượng sản phẩm đủ để đặt hàng hay không
                    $current_quantity = $product->quantity;
                    $new_quantity = $current_quantity - $quantity;
                    if ($new_quantity < 0) {
                        return redirect()->route('order_phone')->with('message', 'Sản phẩm ' . $product->name_product . ' không đủ số lượng');
                    }
                    // Cập nhật số lượng sản phẩm
                    $product->quantity = $new_quantity;
                    $product->save();
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
        // $user_id = Session::get('home')['id'];
        $order->user_id = 'null';
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
        // $order->tong = $totalPrice;
        $tong = $request->input('tong');
        $order->tong = $tong;
        $order->payment_status = 1;
        // giảm số lượng mã giảm giá
        $couponCode = $request->input('admin_name');
            if ($couponCode) {
                $order->coupon = $couponCode;
                $order->save();
                $this->update_discount_quantitys($couponCode);
            }

        // print_r($tong);die;
        $order->save();
        return redirect()->route('order_phone')->with('success', 'Đặt giao gas thành công');
    }

    // cập nhật số lượng mã giảm giá
    function update_discount_quantitys($couponCode) {
        $coupon = tbl_discount::where('ma_giam', $couponCode)->first();
        if ($coupon) {
        $newQuantity = $coupon->so_luong - 1;
        $coupon->update(['so_luong' => $newQuantity]);
        }
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

    // xuất file excel cho ds đơn hàng
    function export_excel(Request $request) {
        $search = $request->input('search');
        $orderQuery = order_product::query();
        if (!empty($search)) {
            $orderQuery->where(function ($query) use ($search) {
                $query->where('nameCustomer', 'LIKE', "%$search%")
                ->orWhere('order_code', 'LIKE', "%$search%");
            });
        }
        $order_product = $orderQuery->get();
        $status = $request->input('status', 'all');
        $loai = $request->input('loai', 'all');
        if ($order_product->isEmpty()) {
            return back()->with('mesage', 'Không có dữ liệu để xuất');
        } else {
            return Excel::download(new ExcelExports($status, $loai, $search), 'ds_don_hang.xlsx');
        }
    }
    

    // quản lý bình luận
    function quan_ly_binh_luan(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_comment = tbl_comment::where('comment_parent_comment', '=', 0)
        ->orderByDesc('id')->get();
        $comment_rep = tbl_comment::where('comment_parent_comment', '>', 0)->orderByDesc('id')->get();
        $staffNames = [];
        foreach ($tbl_comment as $comment) {
            $staffNames[$comment->staff_id] = tbl_admin::find($comment->staff_id)->admin_name;
        }
        return view('backend.quan_ly_binh_luan', ['tbl_comment' => $tbl_comment, 'staffNames' => $staffNames, 'comment_rep' => $comment_rep]);
    }

    // ẩn bình luận
    function hide_comments($id) {
        $tbl_comment = tbl_comment::find($id);
        if ($tbl_comment) {
           $tbl_comment->status_comment = 1; // ẩn
           $tbl_comment->save();
           return redirect()->route('quan-ly-binh-luan');
        } else {
           return redirect()->route('quan-ly-binh-luan')->with('message', 'Không tìm thấy đơn hàng');
        }
    }

    function unhide_comments($id) {
        $tbl_comment = tbl_comment::find($id);
        if ($tbl_comment) {
           $tbl_comment->status_comment = 0; // ẩn
           $tbl_comment->save();
           return redirect()->route('quan-ly-binh-luan');
        } else {
           return redirect()->route('quan-ly-binh-luan')->with('message', 'Không tìm thấy đơn hàng');
        }
    }

    // trả lời bình luận
    function reply_comment(Request $request){
        $data = $request -> all();
        $tbl_comment = new tbl_comment();
        $tbl_comment -> comment = $data['comment'];
        $tbl_comment -> staff_id = $data['staff_id'];
        $tbl_comment -> comment_parent_comment = $data['id'];
        $tbl_comment -> status_comment = 0;
        $tbl_comment -> comment_name = 'GasTech';
        $tbl_comment -> user_id = $data['user_id'];
        $tbl_comment -> save();
    }

    // xóa comment admin
    function delete_comment_admin($id){
        $tbl_comment = tbl_comment::find($id);
        if (!$tbl_comment) {
            return redirect()->route('quan-ly-binh-luan')->with(['message' => 'Không tìm thấy bình luận']);
        }
        $replies = tbl_comment::where('comment_parent_comment', $id)->get();
        foreach ($replies as $reply) {
            $reply->delete();
        }
        $tbl_comment->delete();
        return redirect()->route('quan-ly-binh-luan')->with(['message' => 'Xóa thành công']);
    }

    //xóa trả lời bình luận
    function delete_reply_comment($id){
        $replyComment = tbl_comment::find($id);
        // print_r($replyComment);die;
        $replyComment->delete();
        return redirect()->route('quan-ly-binh-luan')->with(['message' => 'Xóa bình luận thành công']);
    }

}
