@extends('layouts.admin_gas')
@section('sidebar-active-discount', 'active' )
@section('content')


        <div class="col-10 nav-row-10 ">
            <div class="mb-4 product-list-staff-add">
                <span class="product-list-name fs-5">
                    <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-giam-gia')}}">Danh sách mã giảm</a> / <a class="text-decoration-none" href="{{route('add-discounts')}}">Thêm mã mới</a>
                </span>
            </div>
            <div class="add-staff-form">
                <div class="add-staff-heading-div">
                    <span>Tạo mã</span>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('add-discounts')}}">
                    @csrf
                    
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Tên mã</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="name_voucher">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Mã giảm</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="text" name="ma_giam">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all " for="">Số lượng</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="so_luong">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Phần trăm giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="phan_tram_giam">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Giảm từ ngày</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="thoi_gian_giam">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Ngày hết han giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="thoi_gian_giam">
                    </div>

                    <div class="text-center mt-4">
                        <a class="back-product" href="{{route('quan-ly-giam-gia')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>

                </form>

                
            </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#signupForm").validate({
				rules: {
					last_name: "required",
					birth: "required",
					cv_nv: "required",
                    taikhoan: {required: true, email: true},
                    dia_chi: "required",
                    date_input: "required",                        
                    phone: "required",                        
                    luong: "required",       
                    chuc_vu: "required",
				},
				messages: {
					last_name: "Nhập họ tên",
					birth: "Nhập ngày sinh",
					cv_nv: "Chọn chức vụ",

					taikhoan: {
                        required: "Nhập tài khoản",
                        email: "Tài khoản không đúng định dạng",
                    },

					dia_chi: "Nhập địa chỉ",
					date_input: "Nhập ngày vào làm",
					phone: "Nhập số điện thoại",
					luong: "Nhập lương / tháng",
                    chuc_vu: "Chọn chức vụ"

				},
				errorElement: "div",
				errorPlacement: function (error, element) {
					error.addClass("invalid-feedback-staff");
					if (element.prop("type") === "checkbox"){
						error.insertAfter(element.siblings("label"));
					} else {
						error.insertAfter(element);
					}
				},
				highlight: function (element, errorClass, validClass) {
					$(element).addClass("is-invalid").removeClass("is-valid");
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).addClass("is-valid").removeClass("is-invalid");
				} 

			});
        });
</script>

        </div>

    </div>
</div>
