@extends('layouts.admin_gas')
@section('sidebar-active-product-warehouse', 'active' )
@section('content')

        <div class="col-10 nav-row-10 ">
            
            <div class="add-staff-form">
                <div class="add-staff-heading-div">
                    <span>Nhập kho sản phẩm</span>
                </div>
                <div class="ms-4 mb-3">
                    <a class="add-product fs-6" href="{{route('add-product-admin')}}"><i class="fa-solid fa-plus"></i> Sản phẩm</a>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='POST' action="{{route('add-warehouse')}}">
                    @csrf
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Chọn sản phẩm</span>
                        <div class='mt-2 p-0'>
                            <select name="product_id" class="input-add-product col-11 ps-2 pe-2" aria-label="Default select example">
                                <option value="">Chọn sản phẩm</option>
                                @foreach($tbl_product as $product)
                                    <option value="{{$product->id}}">{{$product->id}} - {{$product->name_product}}</option>
                                @endforeach
                            </select>    
                        </div>
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Số lượng</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="number" name="quantity" id="quantity">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Giá nhập</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="text" name="price" id="price">
                    </div>
                    
                    <div class="col-4 mt-3">
                        <span class="name-add-product-all " for="">Nhân viên nhập kho</span>
                        <div class='mt-2 p-0'>
                            <select name="staff_id" class="input-add-product col-11 ps-2 pe-2" aria-label="Default select example">
                                <option value="">Chọn nhân viên</option>
                                @foreach($tbl_admin as $admin)
                                    <option value="{{$admin->id}}">{{$admin-> admin_name}}</option>
                                @endforeach
                            </select>    
                        </div>
                    </div>

                    <div class="col-4 mt-3">
                        <span class="name-add-product-all" for="">Tổng cộng</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="text" name="total" id="total" readonly>
                    </div>

                    <div class="text-center mt-4">
                        <a class="back-product" href="{{route('quan-ly-kho')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
            <script>
                const quantityField = document.getElementById('quantity');
                const priceField = document.getElementById('price');
                const totalField = document.getElementById('total');
                quantityField.addEventListener('input', updateTotal);
                priceField.addEventListener('input', updateTotal);

                function updateTotal() {
                    const quantity = parseFloat(quantityField.value);
                    const price = parseFloat(priceField.value);
                    if (!isNaN(quantity) && !isNaN(price)) {
                        const total = quantity * price;
                        totalField.value = formatNumber(total) + ' đ';
                    } else {
                        totalField.value = '';
                    }
                }

                function formatNumber(number) {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            </script>
            <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
            <script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#signupForm").validate({
                        rules: {
                            product_id: "required",
                            price: {
                                required: true,
                                number: true
                            },
                            quantity: {required: true, number: true, maxlength: 10},                   
                            staff_id: "required"
                        },
                        messages: {
                            product_id: "Chọn sản phẩm",
                            price: {
                                required: "Nhập giá",
                                number: "Vui lòng nhập số"
                            },
                            quantity: {
                                required: "Nhập số lượng",
                                number: "Vui lòng nhập số",
                                maxlength: "Số lượng không quá 10 số",
                            },
                            staff_id: "Chọn nhân viên nhập kho"
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
@endsection
        </div>

    </div>
</div>
