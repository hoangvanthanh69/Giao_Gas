<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index;
use App\Http\Controllers\index_backend;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', [index::class, 'home'] )->name('home');

// login
Route::get('/login', [index::class, 'login'] )->name('login');

// đăng nhập admin
Route::post('getlogin', [index::class, 'getlogin'] )->name('getlogin');
Route::get('logout', [index::class, 'logout'] )->name('logout');

// order sản phẩm
Route::post('/order-product', [index::class, 'order_product'] )->name('order-product');

Route::post('/order', [index::class, 'order'] )->name('order');
// Route::post('/idProduct', [index::class, 'idProduct'] )->name('idProduct');

// Route::post('/handle-order', [index::class, 'handle_order'] )->name('handle-order');

Route::get('/admin', [index_backend::class, 'home'] )->name('admin');

// thêm nhân sản phẩm
Route::get('/add-product-admin', [index_backend::class, 'add_product'] )->name('add-product-admin');

// chi tiết đơn hàng
Route::get('/chitiet-hd/{id}', [index_backend::class, 'chitiet_hd'] )->name('chitiet-hd');
Route::get('/chitiet/{id}', [index_backend::class, 'chitiet'] )->name('chitiet');


//  quản lý sản phẩm
Route:: get('/admin/quan-ly-sp', [index_backend::class, 'quan_ly_sp'] )->name('quan-ly-sp');

Route::post('/add-product', [index_backend::class, 'add'] )->name('add-product');

// xóa sản phẩm
Route::get('/delete/{id}/product', [index_backend::class, 'delete'] )->name('delete-product');


//giao dien add
Route::get('/add-staff', [index_backend::class, 'add_staff'] )->name('add-staff');

// Add 
Route::post('/staff_add', [index_backend::class, 'staff_add'] )->name('staff_add');

// xóa nhân viên
Route::get('/delete-staff/{id}/staff-add', [index_backend::class, 'delete_staff'] )->name('delete-staff');

// xóa đơn hàng
Route::get('/delete-client/{id}/staff-add', [index_backend::class, 'delete_client'] )->name('delete-client');

// edit sản phẩm
Route::get('/edit-product/{id}', [index_backend::class, 'edit_product'] )->name('edit-product');

// cập nhật sản phẩm
Route::post('/update-product/{id}', [index_backend::class, 'update_product'] )->name('update-product');

// edit nhân viên
Route::get('/edit-staff/{id}', [index_backend::class, 'edit_staff'] )->name('edit-staff');

// cập nhật nhân viên
Route::post('/update-staff/{id}', [index_backend::class, 'update_staff'] )->name('update-staff');

//quản lý nhân viên
Route:: get('/admin/quan-ly-nv', [index_backend::class, 'quan_ly_nv'] )->name('quan-ly-nv');

//quản lý hóa đơn
Route:: get('/admin/quan-ly-hd', [index_backend::class, 'quan_ly_hd'] )->name('quan-ly-hd');

// in đơn hàng
Route:: get('/print-order/{checkout_code}', [index_backend::class, 'print_order'] )->name('print-order');

//đăng nhập user
Route::get('/dangnhap', [index::class, 'showLoginForm'] )->name('dangnhap');
Route::post('/dangnhap', [index::class, 'dangnhap'] )->name('dangnhap');

//đăng kí user
Route::get('/register', [index::class, 'register'] )->name('register');
Route::post('/registers', [index::class, 'registers'] )->name('registers');

//đăng xuât người dùng
Route::get('logoutuser', [index::class, 'logoutuser'] )->name('logoutuser');

// lịch sử đơn hàng
Route::get('/order-history', [index::class, 'order_history'] )->name('order-history');

// hủy đơn hàng cập nhật lại trạng thái cho khách hàng
Route::get('/cancel_order/{id}', [index::class, 'cancelOrder'])->name('cancel_order');

// lộc hóa đơn
Route::get('/loc-hd', [index_backend::class, 'loc_hd'] )->name('loc-hd');

// tìm kiếm nhân viên
Route::get('/admin/search-order', [index_backend::class, 'searchOrder'])->name('admin.search_order');

// tài khoản admin
Route::get('/admin/quan-ly-tk-admin', [index_backend::class, 'quan_ly_tk_admin'] )->name('quan-ly-tk-admin');

//cập nhật trạng thái cho admin
Route::post('/status_admin/{id}', [index_backend::class, 'status_admin'])->name('status_admin');

// quản lý đơn hàng giao
Route::get('/admin/quan-ly-giao-hang', [index_backend::class, 'quan_ly_giao_hang'])->name('quan-ly-giao-hang');
Route::post('/quan_ly_giao_hangs', [index_backend::class, 'quan_ly_giao_hangs'])->name('quan_ly_giao_hangs');

// phân quyền nhân viên
Route::get('/don_hang_nhan_vien', [index_backend::class, 'hien_thi_don_hang_nhan_vien'])->name('don_hang_nhan_vien');

// thông tin đơn hàng của khách hàng
Route::get('/thong_tin_don_hang/{id}', [index::class, 'thong_tin_don_hang'])->name('thong_tin_don_hang');

// thống kế chi tiết tổng đơn hàng
Route::get('/admin/thong_ke_chi_tiet_dh', [index_backend::class, 'thong_ke_chi_tiet_dh'])->name('thong_ke_chi_tiet_dh');

// xóa tk admin
Route::get('/delete_account/{admin_id}/tbl_admin', [index_backend::class, 'delete_account'] )->name('delete_account');

// thêm tài khoản admin
Route::post('/add_account/{id}', [index_backend::class, 'add_account'] )->name('add_account');
Route::get('/admin/add_account_admin', [index_backend::class, 'add_account_admin'] )->name('add_account_admin');

// tài khoản khách hàng
Route::get('/quan-ly-tk-user', [index_backend::class, 'quan_ly_tk_user'] )->name('quan-ly-tk-user');

//xoa tai khoan khach hang
Route::get('/delete_account_users/{id}/users', [index_backend::class, 'delete_account_users'] )->name('delete_account_users');

// tìm kiếm sản phẩm
Route::get('/admin/searchOrder_product', [index_backend::class, 'searchOrder_product'])->name('admin.searchOrder_product');

// chi tiet doanh thu
Route::get('/admin/chi_tiet_doanh_thu',[index_backend::class,'chi_tiet_doanh_thu'])->name('chi_tiet_doanh_thu');

// hủy giao hành cho nhân viên
Route::get('/cancel-delivery/{id}', [index_backend::class, 'cancelDelivery'])->name('cancel_delivery');

// đánh giá giao hàng
Route::get('/admin/danh-gia-giao-hang', [index_backend::class, 'danh_gia_giao_hang'])->name('danh-gia-giao-hang');
Route::post('/admin/danh_gia_giao_hangs/{id?}', [index::class, 'danh_gia_giao_hangs'])->name('danh_gia_giao_hangs');

// cap nhat ảnh cho khach hang
Route::post('update_image_user/{id}', [index::class, 'update_image_user'])->name('update_image_user');

// cập nhật mật khẩu cho khách hàng
Route::post('/update-password-customer/{id}', [index::class, 'update_password_customer'])->name('update-password-customer');

// tìm kiếm hóa đơn
Route::get('/admin/search_hd', [index_backend::class, 'search_hd'])->name('admin.search_hd');

// đặt hàng cho khách hàng điện thoại
Route::get('order_phone', [index_backend::class, 'order_phone'])->name('order_phone');
Route::post('add-order', [index_backend::class, 'add_orders'])->name('add-order');

