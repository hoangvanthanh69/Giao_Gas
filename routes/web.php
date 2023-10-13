<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\index;
use App\Http\Controllers\index_backend;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionsController;

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

// trang home customer
Route::get('/home', [index::class, 'home'] )->name('home');

// login
Route::get('/login', [AuthController::class, 'login'] )->name('login');

// đăng nhập admin
Route::post('getlogin', [AuthController::class, 'getlogin'] )->name('getlogin');
Route::get('logout', [AuthController::class, 'logout'] )->name('logout');

// order sản phẩm
Route::post('/order-product', [index::class, 'order_product'] )->name('order-product');

Route::post('/order', [index::class, 'order'] )->name('order');
Route::post('/get-product-by-id', [index::class, 'getProductByID'] )->name('get-product-by-id');

// Route::post('/handle-order', [index::class, 'handle_order'] )->name('handle-order');

Route::get('/admin', [index_backend::class, 'home'] )->name('admin');

// thêm sản phẩm
Route::get('/add-product-admin', [ProductController::class, 'add_product'] )->name('add-product-admin');

// chi tiết đơn hàng
Route::get('/chitiet-hd/{id}', [OrderController::class, 'chitiet_hd'] )->name('chitiet-hd');
Route::get('/chitiet/{id}', [index_backend::class, 'chitiet'] )->name('chitiet');



Route::post('/add-product', [ProductController::class, 'add_products'] )->name('add-product');

// xóa sản phẩm
Route::get('/delete/{id}/product', [ProductController::class, 'delete_product'] )->name('delete-product');

// edit sản phẩm
// Route::get('/edit-product/{id}', [ProductController::class, 'edit_product'] )->name('edit-product');

// cập nhật sản phẩm
Route::post('/update-product/{id}', [ProductController::class, 'update_product'] )->name('update-product');

//giao dien add
Route::get('/add-staff', [StaffController::class, 'add_staff'] )->name('add-staff');

// Add 
Route::post('/staff_add', [StaffController::class, 'staff_add'] )->name('staff_add');

// xóa nhân viên
Route::get('/delete-staff/{id}/staff-add', [StaffController::class, 'delete_staff'] )->name('delete-staff');

// xóa đơn hàng
Route::get('/delete-order/{id}', [OrderController::class, 'delete_order'] )->name('delete-order');

// edit nhân viên
Route::get('/edit-staff/{id}', [StaffController::class, 'edit_staff'] )->name('edit-staff');

// cập nhật nhân viên
Route::post('/update-staff/{id}', [StaffController::class, 'update_staff'] )->name('update-staff');

//quản lý nhân viên
Route:: get('/admin/quan-ly-nv', [StaffController::class, 'quan_ly_nv'] )->name('quan-ly-nv');

//quản lý hóa đơn
Route::get('/admin/quan-ly-hd', [OrderController::class, 'quan_ly_hd'] )->name('quan-ly-hd');

// in đơn hàng
Route:: get('/print-order/{checkout_code}', [OrderController::class, 'print_order'] )->name('print-order');

//đăng nhập user
Route::get('/dangnhap', [AuthController::class, 'showLoginForm'] )->name('dangnhap');
Route::post('/dangnhap', [AuthController::class, 'dangnhap'] )->name('dangnhap');

//đăng kí user
Route::get('/register', [AuthController::class, 'register'] )->name('register');
Route::post('/registers', [AuthController::class, 'registers'] )->name('registers');

//đăng xuât người dùng
Route::get('logoutuser', [AuthController::class, 'logoutuser'] )->name('logoutuser');

// lịch sử đơn hàng
Route::get('/order-history', [index::class, 'order_history'] )->name('order-history');

// hủy đơn hàng cập nhật lại trạng thái cho khách hàng
Route::get('/cancel_order/{id}', [index::class, 'cancelOrder'])->name('cancel_order');

// lộc hóa đơn
Route::get('/loc-hd', [index_backend::class, 'loc_hd'] )->name('loc-hd');

// tìm kiếm nhân viên
Route::get('/admin/search-staff', [StaffController::class, 'searchStaff'])->name('admin.search_staff');

// tài khoản admin
Route::get('/admin/quan-ly-tk-admin', [index_backend::class, 'quan_ly_tk_admin'] )->name('quan-ly-tk-admin');

//cập nhật trạng thái cho admin
Route::post('/status_admin/{id}', [OrderController::class, 'status_admin'])->name('status_admin');

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
Route::get('/admin/quan-ly-kho-sp/search_product', [ProductController::class, 'search_product'])->name('admin.search_product');

// chi tiet doanh thu
Route::get('/admin/chi_tiet_doanh_thu',[index_backend::class,'chi_tiet_doanh_thu'])->name('chi_tiet_doanh_thu');

// hủy giao hành cho nhân viên
Route::get('/cancel-delivery/{id}', [OrderController::class, 'cancelDelivery'])->name('cancel_delivery');

// đánh giá giao hàng
Route::get('/admin/danh-gia-giao-hang', [index_backend::class, 'danh_gia_giao_hang'])->name('danh-gia-giao-hang');
Route::post('/admin/danh_gia_giao_hangs/{id?}', [index::class, 'danh_gia_giao_hangs'])->name('danh_gia_giao_hangs');

// cap nhat ảnh cho khach hang
Route::post('update_image_user/{id}', [index::class, 'update_image_user'])->name('update_image_user');

// cập nhật mật khẩu cho khách hàng
Route::post('/update-password-customer/{id}', [index::class, 'update_password_customer'])->name('update-password-customer');

// tìm kiếm hóa đơn
Route::get('/admin/quan-ly-hd/search_hd', [OrderController::class, 'search_hd'])->name('admin.search_hd');

// đặt hàng cho khách hàng điện thoại
Route::get('order_phone', [index_backend::class, 'order_phone'])->name('order_phone');
Route::post('add-order', [index_backend::class, 'add_orders'])->name('add-order');

// kiểm tra khách hàng thông qua số điện thoại
Route::post('check-customer', [index_backend::class, 'checkCustomer'])->name('check-customer');

// giao diện chỉnh sửa tài khoản admin
Route::get('edit-account-admin/{id}', [index_backend::class, 'edit_account_admin'])->name('edit-account-admin');
Route::post('update-account-admin/{id}', [index_backend::class, 'update_account_admin'])->name('update-account-admin');

// tìm kiếm sản phẩm đặt qua đt
Route::get('/admin/search_order_phone', [index_backend::class, 'search_order_phone'])->name('admin.search_order_phone');

// quản lý giảm giá
Route::get('/admin/quan-ly-giam-gia', [DiscountController::class, 'quan_ly_giam_gia'])->name('quan-ly-giam-gia');

// giao diện thêm mã giảm giá 
Route::get('/add-discount', [DiscountController::class, 'add_discount'])->name('add-discount');

// thêm mã mới
Route::post('add-discounts', [DiscountController::class, 'add_discounts'])->name('add-discounts');

// giao diện edit mã giảm giá
Route::get('/edit-discount/{id}', [DiscountController::class, 'edit_discount'])->name('edit-discount');

// xử lý cập nhật mã giảm giá
Route::post('/update-discounts/{id}',[DiscountController::class, 'update_discounts'])->name('update-discounts');

// tìm kiếm mã giảm
Route::get('/admin/searchDiscount', [DiscountController::class, 'searchDiscount'])->name('admin.searchDiscount');

// cập nhật trạng thái mã giảm giá
Route::post('/update_status_discount', [DiscountController::class, 'update_status_discount'])->name('update_status_discount');

// xóa mã giảm giá
Route::get('/delete_discount/{id}', [DiscountController::class, 'delete_discount'])->name('delete_discount');

// tìm kiếm quản lý giao hàng
// Route::get('/search-delivery', [index_backend::class, 'search_delivery'])->name('search-delivery');

// kiểm tra mã giảm giá
Route::post('check-coupon', [DiscountController::class, 'check_coupon'])->name('check-coupon');

// cập nhật số lượng
Route::post('update-discount-quantity', [index::class, 'update_discount_quantity'])->name('update-discount-quantity');
Route::post('update-discount-quantitys', [index_backend::class, 'update_discount_quantitys'])->name('update-discount-quantitys');
Route::post('notification-discount-quantity', [DiscountController::class, 'notification_discount_quantity'])->name('notification-discount-quantity');

// export_excel cho ds đơn hàng
Route::get('export-excel', [OrderController::class, 'export_excel'])->name('export-excel');

// export excel cho ds nhân viên
Route::post('export-excel-staff', [StaffController::class, 'export_excel_staff'])->name('export-excel-staff');

//export execl cho ds kho sản phẩm
Route::get('export-excel-product', [ProductController::class, 'export_excel_product'])->name('export-excel-product');

// thanh toan vnpay
Route::post('/vnpay_payment', [index::class, 'vnpay_payment'])->name('vnpay_payment');
Route::get('/paymentSuccess', [index::class, 'paymentSuccess'] )->name('paymentSuccess');
Route::post('/load-comment', [index::class,'load_comment'])->name('load-comment');
Route::post('/send-comment', [index::class,'send_comment'])->name('send-comment');

// xóa bình luận
Route::get('/delete-comment/{id}', [index::class, 'deleteComment'])->name('delete-comment');

// quản lý bình luận
Route::get('/quan-ly-binh-luan', [index_backend::class, 'quan_ly_binh_luan'])->name('quan-ly-binh-luan');

// ẩn và hien thi bình luận
Route::get('/hide-comments/{id}', [index_backend::class, 'hide_comments'])->name('hide-comments');

Route::get('/unhide-comments/{id}', [index_backend::class, 'unhide_comments'])->name('unhide-comments');

// trả lời bình luận
Route::post('/reply-comment', [index_backend::class, 'reply_comment'])->name('reply-comment');

// xóa bình luận bên admin
Route::get('/delete_comment_admin/{id}/tbl_comment', [index_backend::class, 'delete_comment_admin'] )->name('delete_comment_admin');

// xóa trả lời bình luận
Route::get('/delete_reply_comment/{id}/tbl_comment', [index_backend::class, 'delete_reply_comment'] )->name('delete_reply_comment');

//lọc đơn hàng theo tên a-z, z-a
Route::get('admin/quan-ly-hd/sort_order', [OrderController::class, 'sort_order'])->name('sort_order');

//lọc đơn hàng theo ngày gần nhất và xa nhất
Route::get('quan-ly-hd/data_created_at', [OrderController::class, 'data_created_at'])->name('data_created_at');

// đăng nhập bằng google
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

// nhập kho sản phẩm
Route::get('/add-product-warehouse', [ProductController::class, 'add_product_warehouse'])->name('add-product-warehouse');
Route::post('/add-warehouse', [ProductController::class, 'add_warehouse'])->name('add-warehouse');

// tìm kiếm nhập kho
Route::get('admin/quan-ly-nhap-kho/search-warehouse', [ProductController::class, 'search_warehouse'])->name('search-warehouse');

// xóa nhập kho
Route::get('/delete-warehouse/{id}', [ProductController::class, 'delete_warehouse'])->name('delete-warehouse');

// quản lý tồn kho
Route::get('admin/quan-ly-ton-kho', [ProductController::class, 'quan_ly_ton_kho'])->name('quan-ly-ton-kho');

// tìm kiếm tồn kho
Route::get('search-inventory', [ProductController::class, 'search_inventory'])->name('search-inventory');

// lọc sản phẩm theo loại
Route::get('admin/quan-ly-kho-sp/filters-product-type', [ProductController::class, 'filters_product_type'])->name('filters-product-type');

// lọc ngày mùa hàng
Route::get('admin/quan-ly-hd/date-order-product', [OrderController::class, 'date_order_product'])->name('date-order-product');

// lọc đơn hàng theo loại và trạng thái
Route::get('admin/quan-ly-hd/filters-status-type', [OrderController::class, 'filters_status_type'])->name('filters-status-type');

// lọc nhập kho theo ngày mua hàng
Route::get('admin/quan-ly-nhap-kho/filters-date-warehouse',[ProductController::class, 'filters_date_warehouse'])->name('filters-date-warehouse');

// xuat excel cho nhap kho
Route::get('export-excel-warehouse', [ProductController::class, 'export_excel_warehouse'])->name('export-excel-warehouse');

// lọc theo loại quản lý tồn kho
Route::get('admin/quan-ly-ton-kho/filters-inventory-type', [ProductController::class, 'filters_inventory_type'])->name('filters-inventory-type');

// xuất excel cho tồn kho
Route::get('export-excel-inventory', [ProductController::class, 'export_excel_inventory'])->name('export-excel-inventory');

// import file excel cho sản phẩm
Route::post('import-excel-product', [ProductController::class, 'import_excel_product'])->name('import-excel-product');

// import file excel cho nhập kho sản phẩm
Route::post('import-excel-warehouse', [ProductController::class, 'import_excel_warehouse'])->name('import-excel-warehouse');

// nhắn tin
Route::post('/send-message', [index::class,'send_message'])->name('send-message');
Route::post('/load-message', [index::class,'load_message'])->name('load-message');

// quản lý tin nhắn
Route::get('quan-ly-tin-nhan', [index_backend::class, 'quan_ly_tin_nhan'])->name('quan-ly-tin-nhan');

// trả lời tin nhắn
Route::post('/reply-message', [index_backend::class, 'reply_message'])->name('reply-message');
Route::get('/delete-message/{user_id}/tbl_message', [index_backend::class, 'delete_message'] )->name('delete-message');

// quản lý phân quyền
Route::get('quan-ly-phan-quyen',[PermissionsController::class, 'quan_ly_phan_quyen'])->name('quan-ly-phan-quyen');

// thêm quyền 
Route::get('add-permissions', [PermissionsController::class, 'add_permissions'])->name('add-permissions');
Route::post('add-permission', [PermissionsController::class, 'add_permission'])->name('add-permission');



Route::post('/update-role-permissions/{id}', [PermissionsController::class, 'updateRolePermissions'])->name('update-role-permissions');

// giao diện gán quyền cho quản tị viên 
Route::get('admin/add-role-permission', [PermissionsController::class, 'add_role_permission'])->name('add-role-permission');

// gán quyền cho quản trị viên
Route::post('role-permissions', [PermissionsController::class, 'role_permissions'])->name('role-permissions');

// hiển thị giao diện chỉnh sủa gán qyền
Route::get('edit-role-permissions/{id_admin}', [PermissionsController::class, 'edit_role_permissions'])->name('edit-role-permissions');

// hiển thị thêm nhóm quyền
Route::get('/add-rights-group', [PermissionsController::class, 'add_rights_group'])->name('add-rights-group');

// xử lý thêm nhóm quyền
Route::post('/add-rights-groups', [PermissionsController::class, 'add_rights_groups'])->name('add-rights-groups');

// dánh sách quyền
Route::get('/danh-sach-quyen', [PermissionsController::class, 'danh_sach_quyen'])->name('danh-sach-quyen');

// chỉnh sửa quyền
Route::get('/edit-permissions/{permission_id}', [PermissionsController::class, 'edit_permissions'])->name('edit-permissions');
Route::post('/update-permissions/{permission_id}', [PermissionsController::class, 'update_permissions'])->name('update-permissions');

// xóa quyền
Route::get('/delete-permissions/{permission_id}', [PermissionsController::class, 'delete_permissions'])->name('delete-permissions');

//  quản lý sản phẩm
Route::get('/admin/quan-ly-kho-sp', [ProductController::class, 'quan_ly_sp'] )->name('quan-ly-sp')->middleware('check.permission:1');

// quản lý kho
Route::get('admin/quan-ly-nhap-kho', [ProductController::class, 'quan_ly_kho'])->name('quan-ly-kho')->middleware('check.permission:2');

Route::get('/edit-product/{id}', [ProductController::class, 'edit_product'])
    ->name('edit-product')->middleware('check.permission:1');
