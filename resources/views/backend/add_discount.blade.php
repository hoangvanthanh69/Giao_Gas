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
                        <span class="name-add-product-all " for="">Loại giảm</span>
                        <select id="type" name="type" class="input-add-product col-11 ps-2 pe-2 mt-2" aria-label="Default select example">
                            <option value="">Chọn Loại</option>
                            <option value="1">Giảm theo phần trăm</option>
                            <option value="2">Giảm theo giá tiền</option>
                        </select>   
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Giá trị giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="gia_tri">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Giảm từ ngày</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="thoi_gian_giam">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Ngày hết hạn giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="het_han">
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
					name_voucher: "required",
					ma_giam: "required",
					so_luong: "required",
                    gia_tri: "required",
                    thoi_gian_giam: "required",                        
                    het_han: "required",       
                    type: "required",       
				},
				messages: {
					name_voucher: "Nhập tên giảm",
					ma_giam: "Nhập mã giảm",
					so_luong: "Nhập số lượng",
                    gia_tri: "Nhập giá trị giảm",
					thoi_gian_giam: "Nhập ngày bắt đầu giảm",
					het_han: "Nhập ngày hết hạn giảm",
					type: "Chọn loại giảm giá",
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
