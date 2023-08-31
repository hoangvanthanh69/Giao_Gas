@extends('layouts.admin_gas')
@section('sidebar-active-product', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">
        <div class="add-product-each w-50 ">
          <form id="signupForm" enctype="multipart/form-data" method='post' action="{{route('add-product')}}">
            @csrf
            <div class="row">
              <label class="name-add-product-all col-3" for="">Tên sản phẩm:</label>
              <input class="input-add-product col-9" type="text" name="name_product">
            </div>
            <br>
            <div class="delivery-location form-product-specials product-type row">
              <label class="name-add-product-all col-3" for="loai" class="form-label">Loại bình gas:</label>
              <div class='col-9 p-0'>
                <select id="loai" name="loai" class="form-select " aria-label="Default select example">
                  <option value="0">Chọn loại gas</option>
                  <option value="1" name="cn">Gas công nghiệp</option>
                  <option value="2" name="dd">Gas dân dụng</option>
                </select>    
              </div>
            </div>

            <div class="row mt-4">
              <label class="name-add-product-all col-3" for="">Thêm ảnh:</label>
              <input  class="input-add-product name-add-product-all-img col-9" type="file" name="image">
            </div>

            <div class="row mt-4">
              <label class="name-add-product-all col-3" for="">Giá ban đầu:</label>
              <input class="input-add-product col-9" type="text" name="price">
            </div>

            <div class="row mt-4">
              <label class="name-add-product-all col-3" for="">Giá bán:</label>
              <input class="input-add-product col-9" type="text" name="original_price">
            </div>

            <div class="row mt-4">
              <label class="name-add-product-all col-3" for="">Số lượng:</label>
              <input class="input-add-product col-9" type="text" name="quantity">
            </div>

            <div class="back-add-product">
              <a class="back-product" href="{{route('quan-ly-sp')}}">Trở lại</a>
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
					name_product: "required",
					cn: "required",
					dd: "required",
					image: "required",
          price: "required",
          original_price: "required",
          quantity: "required",         
				},
				messages: {
					name_product: "Nhập tên sản phẩm",
					cn: "Chọn loại",
					dd: "Chọn loại",
					image: "Thêm ảnh",
					price: "Nhập Giá",
					original_price: "Nhập giá bán",
					quantity: "Nhập mã",

				},
				errorElement: "div",
				errorPlacement: function (error, element) {
					error.addClass("invalid-feedback-product");
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