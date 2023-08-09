<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_discount;
use Session;
use Carbon\Carbon;
class DiscountController extends Controller
{
    // quản lý giảm giá
    function quan_ly_giam_gia(Request $request){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        // cập nhật lại trạng thái khi hết hạn
        $this->update_status_discount($request);
        $tbl_discount = tbl_discount::orderByDesc('created_at')->get()->toArray();
        return view('backend.quan_ly_giam_gia', ['tbl_discount' => $tbl_discount]);
    }

    // giao diện thêm mã giảm
    function add_discount(){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        return view('backend.add_discount');
    }
    
    // thêm mã mới
    function add_discounts(Request $request){
        $data = $request -> all();
        $add_discount = new tbl_discount;
        $add_discount -> name_voucher = $data['name_voucher'];
        $add_discount -> ma_giam = $data['ma_giam'];
        $add_discount -> so_luong = $data['so_luong'];
        $add_discount -> phan_tram_giam = $data['phan_tram_giam'];
        $add_discount -> thoi_gian_giam = $data['thoi_gian_giam'];
        $add_discount -> het_han = $data['het_han'];
        $add_discount->status = 1;
        $add_discount -> save();  
        return redirect()->route('quan-ly-giam-gia');
    }

    // giao diện edit thêm mã giảm 
    function edit_discount($id){
        if(!Session::get('admin')){
            return redirect()->route('login');
        }
        $tbl_discount = tbl_discount::find($id);
        return view('backend.edit_discount', ['tbl_discount' => $tbl_discount]);
    }

    // cập nhật mã mới
    function update_discounts(Request $request, $id){
        $tbl_discount = tbl_discount::find($id);
        $tbl_discount -> name_voucher = $request -> name_voucher;
        $tbl_discount -> ma_giam = $request -> ma_giam;
        $tbl_discount -> so_luong = $request -> so_luong;
        $tbl_discount -> phan_tram_giam = $request -> phan_tram_giam;
        $tbl_discount -> thoi_gian_giam = $request -> thoi_gian_giam;
        $tbl_discount -> het_han = $request -> het_han;
        $tbl_discount -> save();
        return redirect()->route('quan-ly-giam-gia');
    }

    // tìm kiếm mã giảm giá
    function searchDiscount(Request $request){
        if ($request->isMethod('get')) {
            $search = $request->input('search');
            $tbl_discount = tbl_discount::where('ma_giam', 'LIKE', "%$search%")->orWhere('name_voucher', 'LIKE', "%$search%")->paginate(10);
            if(empty($tbl_discount->items())){
                return back()->with('mesage', 'Không tìm thấy kết quả');
            } else {
                return view('backend.quan_ly_giam_gia', ['tbl_discount' => $tbl_discount, 'search' => $search]);
            }
        } else {
            return redirect()->back();
        }
    }

    // cập nhật trạng thái giảm giá khi hết hạn
    function update_status_discount(Request $request) {
        $discounts = tbl_discount::where('status', 1)->get();
        foreach ($discounts as $discount) {
            $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $discount->het_han);
            $currentDate = Carbon::now();
            if ($currentDate->gte($endDate)) {
                $discount->status = 2;
                $discount->save();
            }
        }
    }

    // xóa mã giảm giá chưa có làm
    function delete_discount($id){
        $tbl_discount = tbl_discount::find($id);
        $tbl_discount -> delete();
        return redirect()->back();
    }
}
