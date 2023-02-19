@extends('layouts.admin_gas')
@section('content')


        <div class="col-10 nav-row-10 ">
            <div class="add-product-each w-50 ">
                <form id="signupForm" action="{{route('staff_add')}}">
                    <div class="row">
                        <label class="name-add-product-all col-4" for="">Họ và Tên:</label>
                        <input class="input-add-product col-8" type="text" name="last_name">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Năm sinh:</label>
                        <input class="input-add-product col-8" type="date" name="birth">
                    </div>

                    <div class="row mt-4 ">
                        <label class="name-add-product-all col-4" for="">Chức vụ:</label>

                        <div class='col-8 p-0'>
                            <select id="chuc_vu" name="chuc_vu" class="form-select " aria-label="Default select example">
                                <option value="0">Chọn chức vụ</option>
                                <option value="1" name="cv_nv">Nhân viên</option>
                                <option value="2">Quản lý</option>
                            </select>    

                        </div>
                        
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Tài khoản @:</label>
                        <input class="input-add-product col-8" type="text" name="taikhoan">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Địa chỉ:</label>
                        <input class="input-add-product col-8" type="text" name="dia_chi">
                    </div>

    

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Ngày vào làm:</label>
                        <input class="input-add-product col-8" type="date" name="date_input">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Số điện thoại:</label>
                        <input class="input-add-product col-8" type="text" name="phone">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Lương/tháng:</label>
                        <input class="input-add-product col-8" type="text" name="luong">
                    </div>
                    
                    <div class="back-add-product">
                        <a class="back-product" href="{{route('quan-ly-nv')}}">Trở lại</a>
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
				},
				messages: {
					last_name: "Nhập họ tên",
					birth: "Nhập ngày sinh",
					cv_nv: "Chọn chức vụ",

					taikhoan: {
                        required: "Bạn  nhập mật khẩu",
                        email: "Tài khoản không đúng",
                    },

					dia_chi: "Nhập địa chỉ",
					date_input: "Nhập ngày vào làm",
					phone: "Nhập số điện thoại",
					luong: "Nhập lương / tháng",
                    

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
