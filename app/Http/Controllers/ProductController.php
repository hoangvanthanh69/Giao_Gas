<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order_product;
use App\Models\tbl_admin;
use App\Models\product_warehouse;
use Session;
class ProductController extends Controller
{
    // quản lý sản phẩm
    function quan_ly_sp(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $admin_name = Session::get('admin')['admin_name'];
        $chuc_vu = Session::get('admin')['chuc_vu'];
        if($chuc_vu == '2'){
            $product = product::orderByDesc('id')->paginate(10);
        }
        elseif($chuc_vu == '3'){
            $product = product::orderByDesc('id')->paginate(10);
        }
        $order_product = order_product::get()->toArray();
        return view('backend.quan_ly_sp', ['product' => $product, 'order_product' => $order_product]);
    }

    // hiển thị giao diện chỉnh sửa sản phẩm
    function edit_product($id){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $product = product::find($id);
        return view('backend.edit_product', ['product' => $product]);
    }

    // cập nhật sản phẩm
    function update_product(Request $request, $id){
        $product = product::find($id);
        $product->name_product = $request->name_product;
        $product->loai = $request->loai;
        // $get_image = $request->image;
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
        $product->save();
        return redirect()->route('quan-ly-sp');
    }

    // hiển thị giao diện thêm sản phẩm mới
    function add_product(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        return view('backend.add_product');
    }

    // xử lý thêm sản phẩm mới
    function add_products(Request $request){
        $data = $request->all();
        //    print_r($data);
        $product = new product;
        $product -> name_product = $data['name_product'];
        $product -> loai = $data['loai'];
        $product -> price =  $data['price'];
        $product -> quantity = 0;
        $product -> original_price =  $data['original_price'];
        $get_image = $request->image;
        $path = 'uploads/product/';
        $get_name_image = $get_image -> getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image -> getClientOriginalExtension();
        $get_image -> move($path,$new_image);
        $product -> image = $new_image;
        $product -> save();  
        return redirect()->route('quan-ly-sp');
    }

    // xóa sản phẩm
    function delete_product($id){
        $product = product::find($id);
        $product -> delete();
        return redirect()->route('quan-ly-sp')->with('success', 'Xóa sản phẩm thành công');
    }

    // tìm kiếm sản phẩm
    function search_product(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $product = product::where('id', 'LIKE', "%$search%")->orWhere('name_product', 'LIKE', "%$search%")->paginate(10);
            if(empty($product->items())){
                return back()->with('mesages', 'Không tìm thấy kết quả');
            } else {
                return view('backend.quan_ly_sp', ['product' => $product, 'search' => $search]);
            }
        } else {
            return redirect()->back();
        }
    }

    // quản lý kho
    function quan_ly_kho(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $product_warehouse = product_warehouse::orderByDesc('created_at')->paginate(10);
        $productNames = [];
        foreach ($product_warehouse as $name) {
            $productNames[$name->product_id] = product::find($name->product_id)->name_product;
        }
        $admin_Names=[];
        foreach($product_warehouse as $name){
            $admin_Names[$name->staff_id] = tbl_admin::find($name->staff_id)->admin_name;
        }
        $search = $request->input('search');
        return view('backend.quan_ly_kho', ['product_warehouse' => $product_warehouse,
        'productNames' => $productNames, 'admin_Names' => $admin_Names, 'search' => $search]);
    }

    //giao diện nhập kho sản phẩm
    function add_product_warehouse(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_product = product::get();
        $tbl_admin = tbl_admin::get();
        $name_product = session()->get('name_product');
        $admin_name = session()->get('admin_name');
        return view('backend.add_product_warehouse', ['tbl_product' => $tbl_product, 'name_product' => $name_product,
            'tbl_admin' => $tbl_admin, 'admin_name' => $admin_name
        ]);
    }

    // nhập kho sản phẩm
    function add_warehouse(Request $request){
        $data = $request->all();
        $add_warehouse = new product_warehouse;
        $product_id = $request->input('product_id');
        $staff_id = $request->input('staff_id');
        $quantity = $request->input('quantity');
        $price = $request->input('price'); // giá nhập vào kho
        $add_warehouse -> product_id = $product_id;
        $add_warehouse -> staff_id = $staff_id;
        $add_warehouse -> quantity = $data['quantity'];
        $add_warehouse -> price = $data['price'];
        $add_warehouse -> batch_code = uniqid();
        $tong = $data['quantity'] * $data['price'];
        $add_warehouse -> total = $tong;
        $add_warehouse -> save();
        $product = product::find($product_id);
        if ($product) {
            $lastPurchasePrice = $price;
            $profitMargin = 0.3;
            $newSellingPrice = $lastPurchasePrice + ($lastPurchasePrice * $profitMargin); // tính giá bán
            $product->price = $newSellingPrice;
            $product->quantity += $quantity; // Cộng thêm số lượng mới vào số lượng hiện tại bên bảng product
            if ($product->original_price == 0) {
                $product->original_price = $price;
                $product->save();
            }
            $product->save();
        }
        return redirect()->route('quan-ly-kho');
    }

    // tìm kiếm kho 
    function search_warehouse(Request $request){
        if (!Session::get('admin')) {
            return redirect()->route('login');
        }
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $productIds = product::where('name_product', 'LIKE', "%$search%")->pluck('id')->toArray();
            $staffIds = tbl_admin::where('admin_name', 'LIKE', "%$search%")->pluck('id')->toArray();
            $product_warehouse = product_warehouse::whereIn('product_id', $productIds)
                ->orWhereIn('staff_id', $staffIds)
                ->orWhere('batch_code', 'LIKE', "%$search%")
                ->orWhere('product_id', 'LIKE', "%$search%")
                ->get();
            $productNames = [];
            foreach ($product_warehouse as $name) {
                $productNames[$name->product_id] = product::find($name->product_id)->name_product;
            }
            $admin_Names = [];
            foreach ($product_warehouse as $name) {
                $admin_Names[$name->staff_id] = tbl_admin::find($name->staff_id)->admin_name;
            }
            if ($product_warehouse->isEmpty()) {
                return back()->with('mesages', 'Không tìm thấy kết quả');
            }else {
                return view('backend.quan_ly_kho', [
                    'product_warehouse' => $product_warehouse,
                    'search' => $search,
                    'productNames' => $productNames,
                    'admin_Names' => $admin_Names,
                ]);
            }
        } else {
            return redirect()->back();
        }
    }
}
