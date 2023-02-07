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
Route::post('/idProduct', [index::class, 'idProduct'] )->name('idProduct');

Route::post('/handle-order', [index::class, 'handle_order'] )->name('handle-order');

Route::get('/admin', [index_backend::class, 'home'] )->name('admin');

// thêm nhân sản phẩm
Route::get('/add-product-admin', [index_backend::class, 'add_product'] )->name('add-product-admin');

// chi tiết đơn hàng
Route::get('/chitiet-hd/{id}', [index_backend::class, 'chitiet_hd'] )->name('chitiet-hd');

// 
Route::get('/chitiet/{id}', [index_backend::class, 'chitiet'] )->name('chitiet');
// 

//  quản lý sản phẩm
Route:: get('/admin/quan-ly-sp', [index_backend::class, 'quan_ly_sp'] )->name('quan-ly-sp');

Route::post('/add-product', [index_backend::class, 'add'] )->name('add-product');

// xóa sản phẩm
Route::get('/delete/{id}/product', [index_backend::class, 'delete'] )->name('delete-product');


//giao dien add
Route::get('/add-staff', [index_backend::class, 'add_staff'] )->name('add-staff');

// Add 
Route::get('/staff_add', [index_backend::class, 'staff_add'] )->name('staff_add');

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

// quản lý thống kê
Route:: get('/admin/quan-ly-thong-ke', [index_backend::class, 'quan_ly_thong_ke'] )->name('quan-ly-thong-ke');


// in đơn hàng
Route:: get('/print-order/{checkout_code}', [index_backend::class, 'print_order'] )->name('print-order');

//đăng nhập user
Route::get('/dangnhap', [index::class, 'dangnhap'] )->name('dangnhap');

