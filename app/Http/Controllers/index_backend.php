<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\add_staff;
use App\Models\order_product;
use App\Models\tbl_admin;
use Session;
use DB;
use Illuminate\Support\Facades\Auth;

use PDF;
class index_backend extends Controller
{
    function home(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $product = product::get()->toArray();
        $staff = add_staff::get()->toArray();
        $order_product = order_product::get()->toArray(); 

        $count_product = product::count();
        $count_staff = add_staff::count();
        $count_order = order_product::count();

        $tbl_admin = tbl_admin::get()->toArray();
        // print_r($count_order);

        
        return view('backend.admin',['product'=> $product , 'staff' => $staff , 'order_product' => $order_product, 'tbl_admin' => $tbl_admin], compact('count_product', 'count_staff', 'count_order',));
    }

    function chitiet_hd(Request $request, $id){
        $order_product = order_product::find($id);
        //    echo " <pre>";
        //    print_r($staff);
        return view('backend.chitiet_hd' , ['order_product' => $order_product]);
    }

    function chitiet(Request $request, $id){
        $order_product = order_product::find($id);
        //    echo " <pre>";
        //    print_r($staff);
        return view('backend.chitiet' , ['order_product' => $order_product]);
    }

    function add_product(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        return view('backend.add_product');
    }

    function add(Request $request){
        $data =  $request->all();
         //    echo " <pre>";
         //    print_r($data);
         $product = new product;
         $product->name_product =  $data['name_product'];
         $product->loai =  $data['loai'];
         $product->price =  $data['price'];
         $product->quantity =  $data['quantity'];
         $product->original_price =  $data['original_price'];
         
         $get_image = $request->image;
         $path = 'uploads/product/';
         $get_name_image = $get_image-> getClientOriginalName();
         $name_image = current(explode('.',$get_name_image));
         $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
         $get_image->move($path,$new_image);
         $product->image = $new_image;
         $product -> save();  
         return redirect()->route('quan-ly-sp');
     }

    function delete($id){
        $product = product::find($id);
        $product->delete();
        return redirect()->route('quan-ly-sp')->with('success','Xóa sản phẩm thành công');
    }


    function edit_product($id)
    {
        $product = product::find($id);
        //    echo " <pre>";
        //    print_r($product);
        return view('backend.edit_product' , ['product' => $product]);
    }

    function update_product(Request $request, $id)
    {
        $product = product::find($id);
        $product->name_product = $request->name_product;
        $product->loai = $request->loai;
        $get_image = $request->image;

        $get_image = $request->image;
        if($get_image){
            // Bỏ hình ảnh cũ
            $path_unlink = 'uploads/product/'.$product->image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
            // Thêm mới
            $path = 'uploads/product/';
            $get_name_image = $get_image-> getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $product->image = $new_image;
        }

        $product->price = $request->price;
        $product->original_price = $request->original_price;
        $product->quantity = $request->quantity;
        // $product->quantity = $request->quantity;
        $product->save();
        return redirect()->route('quan-ly-sp');
    }

    function edit_staff($id){
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

    // quan ly san pham
    function quan_ly_sp(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $product = product::get()->toArray();
        $order_product = order_product::get()->toArray(); 
        return view('backend.quan_ly_sp', ['product'=> $product,'order_product' => $order_product]);
    }

    // quản lý nhân viên 
    function quan_ly_nv(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $staff = add_staff::get()->toArray();
        return view('backend.quan_ly_nv',['staff' => $staff]);
    }

    // quản lý hóa đơn
    function quan_ly_hd(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $order_product = order_product::get()->toArray(); 
        $status = isset($_GET['status']) ? $_GET['status'] : 'all';
        return view('backend.quan_ly_hd',['order_product' => $order_product, 'status' => $status]);
    }
    

    // quản lý thống kê
    function quan_ly_thong_ke(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $data =  $request->all();
        $count_product = product::count();
        $count_staff = add_staff::count();
        $count_order = order_product::count();
        $data_price=product::sum('price');
        $data_original_price=product::sum('original_price');
        $count_product1 = product::where('loai','=',1)->count();
        $count_product2 = product::where('loai','=',2)->count();
        $data_price1= product::where('loai','=',1)->sum('price');
        $data_price2= product::where('loai','=',2)->sum('price');
        $count_staff_chuvu1 = add_staff::where('chuc_vu','=',1)->count();
        $count_staff_chuvu2 = add_staff::where('chuc_vu','=',2)->count();
        $tong_gia=order_product::sum('tong');
        $product_all=product::sum('quantity');

        // print_r($product_all);
        // print_r($tong_gia);
        return view('backend.quan_ly_thong_ke', compact('count_product', 'count_staff', 'count_order', 
        'data_price', 'data_original_price', 'count_product1', 'count_product2', 'data_price1', 
        'data_price2', 'count_staff_chuvu1', 'count_staff_chuvu2', 'tong_gia', 'product_all'));
    }


    // in đơn hàng
    function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    function print_order_convert($checkout_code){
        $order_product = order_product::where('id', $checkout_code)->get();
        foreach($order_product as $key => $val){
            $id = $val -> id;
            $idProduct = $val -> idProduct;
        }
        $order_product = order_product:: where('id', $id)->first();
        $order_product = order_product:: where('idProduct', $idProduct)->first();
        // print_r($order_product);

        $output = '';
        $output.= '<style>
        body{
            font-family:Dejavu Sans;
        }
        .table-thead{
            margin-top: 10px;
            border: 1px solid #000;
        }
        .table-thead{
            border: 1px solid #000;
        }
        .tbody-tr-td td{
            width: 170px;
            border:1px solid #000;
            text-align: center;
        }
        .thead-tr-name-table th{
            width: 100px;
            border:1px solid #000;
        }
        .receipt-h3{
            text-align: center;
        }
        </style>
                <div class="receipt-h3">
                    <h2> Gas Tech </h2>
                    <span>Nhanh chóng - An toàn - Chất lượng - Hiệu quả</span>
                    <p>SĐT 0837641469</p>
                </div>
                
                
                <h3 class="receipt-h3"> HÓA ĐƠN THANH TOÁN </h3>
                <div class="infor-customer">
                    <label class="name-add-product-all col-3" for="">Tên Khách Hàng:</label>
                    <span>
                        '. $val['nameCustomer'].'
                    </span>
                </div>

                <div class="">
                    <label class="name-add-product-all col-3" for="">Địa chỉ:</label>
                    <span>
                        '. $val['diachi'].', '. $val['district'].', '. $val['state'].', '. $val['country'].'
                    </span>
                </div>

                <div class="">
                    <label class="name-add-product-all col-3" for="">Số điện thoại:</label>
                    <span>
                        '. $val['phoneCustomer'].'
                    </span>
                </div>
                
                <table class="table-thead">
                    <thead>
                        <tr class="thead-tr-name-table">
                            <th>Tên sản phẩm</th>
                            <th>SL</th>
                            <th>Giá</th>
                            <th>Ngày tạo</th>

                        </tr>
                    </thead>
                        
                    <tbody class="infor">';
                    $output .= '
                        

                        <tr class="tbody-tr-td">
                            <td>
                            '. $val['name_product'].'
                            </td>

                            <td>
                            '. $val['amount'].'
                            </td>

                            <td>
                            '. number_format($val['price'] * $val['amount']).' VNĐ
                            </td>

                            <td>
                            '. $val['created_at'].'
                            </td>


                        </tr>';
                    $output .= '

                    </tbody>
                </table>
                <p class="receipt-h3">Gas Tech xin chân thành cảm ơn quý khách,</p>
                <p class="receipt-h3">Hẹn gặp lại !</p>

                ';

        return $output;

        
    }


    // tìm kiếm nhân viên
    function searchOrder(Request $request){
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $staff = add_staff::where('id', 'LIKE', "%$search%")->orWhere('last_name', 'LIKE', "%$search%")->get()->toArray();
            if(empty($staff)){
                return back()->with('mesages', 'Không tìm thấy kết quả');
            } else {
                return view('backend.quan_ly_nv', ['staff' => $staff, 'search' => $search]);
            }
        } else {
            return redirect()->back();
        }
    }

    // tài khoản admin
    function quan_ly_tk_admin(){
        $tbl_admin = tbl_admin::get()->toArray();
        return view('backend.quan_ly_tk_admin', ['tbl_admin' => $tbl_admin]);
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
            $order_product = order_product::where('status', 1)->get()->toArray(); 
        } else if ($status == '2') {
            $order_product = order_product::where('status', 2)->get()->toArray(); 
        } else {
            $order_product = order_product::whereIn('status', [1, 2])->get()->toArray(); 
        }
        $tbl_admin = tbl_admin::get();
        $admin_name = session()->get('admin_name');
        $product_id = session()->get('product_id');

        //

        return view('backend.quan_ly_giao_hang', ['order_product' => $order_product, 'status' => $status, 'tbl_admin' => $tbl_admin,
        'admin_name' => $admin_name,]);
    }
    
    public function quan_ly_giao_hangs(Request $request){
        $product_id = $request->input('id');
        $id = $request->input('id');
        $admin_id = $request->input('admin_id');
        $admin_name = $request->input('admin_name');

        $order_product = DB::table('order_product')->where('id',$id)->update(['admin_id' => $admin_id,]);

        $order_product = DB::table('tbl_admin')->where('admin_id',$admin_id)->update(['product_id' => $product_id,]);
        
        return redirect()->back();
    }
    
   

}
