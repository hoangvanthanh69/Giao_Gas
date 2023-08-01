<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order_product;
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
            // $product = order_product::where(['admin_name' => $admin_name])->orderByDesc('id')->paginate(10);
        }
        // $product = product::get()->toArray();
        // $product = product::paginate(10);
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
        $data =  $request->all();
        //    print_r($data);
        $product = new product;
        $product -> name_product = $data['name_product'];
        $product -> loai = $data['loai'];
        $product -> price =  $data['price'];
        $product -> quantity =  $data['quantity'];
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

}
