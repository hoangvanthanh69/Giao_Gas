@extends('layouts.admin_gas')
@section('sidebar-active-add-order', 'active' )
@section('content')
    <div class="col-10">
        <div class="header-order-product mt-4">
            <div>
                <h5 class="color-logo-tech text-center pt-3">Thêm đơn hàng mới từ số điện thoại</h5>
            </div>
            <div class="search-prodcut-order-phone">
                <input type="text" autocapitalize="off" class="header-search-order-product" placeholder="Tìm kiếm" name="search" id="searchInput" onkeyup="searchProducts(this.value)">
                <span class="header-search-button">
                    <i class="header-search-order-product-icon fas fa-search"></i>
                </span>
            </div>
        </div>

        @if (session('mesage'))
            <div class="success-customer-home-notification d-flex">
                <i class="fas fa-ban icon-check-cancel"></i>
                {{ session('mesage') }}
            </div>
        @endif
        <div class="row show-infor-product-orders container">
            <form class="row g-2" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('add-order')}}">
                @csrf
                <div class="col-5 text-light ">
                    <div class="p-3 me-2 bg-order-product">
                        <div class="">
                            <label class="name-add-product-customer-all" for="">Số điện thoại:</label>
                            <input class="infor-customer-input col-12" type="text" name="phoneCustomer" id="phoneCustomer">
                        </div>

                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Họ và Tên:</label>
                            <input class="infor-customer-input col-12" type="text" name="nameCustomer" id="nameCustomer">
                        </div>

                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Đỉa chỉ:</label>
                            <div class="d-flex address-customer-form">
                                <div>
                                    <input class="address-customer-input" type="text" name="country" id="country" placeholder="Tỉnh/TP">
                                </div>
                    
                                <div>
                                    <input class="address-customer-input" type="text" name="state" id="state" placeholder="Quận/Huyện">
                                </div>

                                <div>
                                    <input class="address-customer-input" type="text" name="district" id="district" placeholder="Phường/Xã">
                                </div>

                                <div>
                                    <textarea class="address-customer-input" type="text" name="diachi" id="diachi" placeholder="đia chỉ"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Loại gas:</label>
                            <div class= "p-0">
                                <select class="form-select handle_order select-option" id="loai" name="loai" aria-label="Default select example" onchange="showProductsByType(this)">
                                    <option value="">Chọn loại gas</option>
                                    <option value="1" name="cn">Gas công nghiệp</option>
                                    <option value="2" name="dd">Gas dân dụng</option>
                                </select> 
                            </div>
                                
                        </div>

                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Giảm giá:</label>
                            <div class= "p-0">
                                <select id="type" name="type" class="form-select " aria-label="Default select example">
                                    <option value="0">Chọn voucher</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Ghi chú:</label>
                            <input class="infor-customer-input col-12" type="text" name="ghichu" id="ghichu">
                        </div>
                        
                        <div class="mt-4">
                            <label class="name-add-product-customer-all" for="">Tổng giá:</label>
                            <input class="infor-customer-input col-12" type="text" name="luong">
                        </div>

                        <div class="mt-4 sumbmit-order-product" id="show_infor">
                            <div class="float-end ">
                                <button class="btn btn-primary submit" id="submitButton">Giao gas</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-7 pt-3 bg-order-product">
                    <div class="container ">
                        <div class="row g-2 product-order-all mb-3" id="infor_gas">
                            <div class="text-center">
                                <p class="text-light fs-4">Hiển thị sản phẩm</p>
                                <i class="fa-solid fa-cart-shopping infor-product-order-admin"></i>
                            </div>
                            <!-- Thông tin sản phẩm sẽ được hiển thị -->
                        </div>
                    </div>
                </div>
            </form>
            
            
        </div>
@endsection
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend/js/jquery.validate.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#phoneCustomer').on('blur', function() {
                var phoneNumber = $(this).val();
                $.ajax({
                    url: "{{ route('check-customer') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phoneNumber
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#nameCustomer').val(response.customerName);
                            $('#country').val(response.country);
                            $('#state').val(response.state);
                            $('#district').val(response.district);
                            $('#diachi').val(response.diachi);
                        } else {
                        // k hien thi gi het
                        }
                    },
                    error: function(xhr, status, error) {
                        
                    }
                });
            });
        });
    </script>

    <script>
        var selectedProducts = [];
            function showProductsByType(selectElement) {
                var selectedType = selectElement.value;
                var inforGasDiv = document.getElementById("infor_gas");
                inforGasDiv.innerHTML = "";
                var allProducts = <?php echo json_encode($products); ?>;
                if (selectedType === "0") {
                    for (var i = 0; i < allProducts.length; i++) {
                        var product = allProducts[i];
                        var html = generateProductHTML(product);
                        inforGasDiv.innerHTML += html;
                    }
                } else {
                    var filteredProducts = allProducts.filter(product => product.loai == selectedType);
                    for (var i = 0; i < filteredProducts.length; i++) {
                        var product = filteredProducts[i];
                        var html = generateProductHTML(product);
                        inforGasDiv.innerHTML += html;
                    }
                }
            }
            function generateProductHTML(product) {
                var html = `
                    <div class="col-3 productchoose" id="${product.id}" onclick="highlightProduct(this)">
                        <div class="p-3 border border-light image-product-order-all">
                            ${product.quantity == 0 ? 
                                '<div class="home-product-item-sale-off"><span class="home-product-item-sale-off-label">Hết gas</span></div>' : ''
                            }
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onchange="changeInputColor(this)">
                            </div>

                            <div class="image-product-order mb-2">
                                <img class="" src="uploads/product/${product.image}" alt="" width="50%">
                            </div>
                            <div class="name-product-order">
                                Sản phẩm:
                                <span class="name_product name-product-span">${product.name_product}</span>
                            </div>
                            <div class="price-product-order price" id="price">
                                Giá:
                                <span class="original_price gia price-product-order-span">${numberFormat(product.original_price)} đ</span>
                            </div>
                            
                            <div class="d-flex mt-1">
                                <label class="col-7">Số lượng:</label>
                                <input class="col-5 quatity-order-phone" type="number" id="quantity" name="infor_gas[${product.id}]" data-id="${product.id}" onchange="updateProductQuantity(this)">
                            </div>
                        </div>
                    </div>
                `;
                return html;
            }

            function numberFormat(number) {
                return number.toLocaleString("vi-VN");
            }
            function searchProducts(keyword) {
                var inforGasDiv = document.getElementById("infor_gas");
                var productsToShow = inforGasDiv.getElementsByClassName("productchoose");
                for (var i = 0; i < productsToShow.length; i++) {
                    var productName = productsToShow[i].querySelector(".name_product").textContent.toLowerCase();
                    if (productName.includes(keyword.toLowerCase())) {
                        productsToShow[i].style.display = "block";
                    } else {
                        productsToShow[i].style.display = "none";
                    }
                }
            }

            function updateProductQuantity(input) {
                var selectedProductId = input.getAttribute("data-id");
                var selectedProductQuantity = parseInt(input.value);
                for (var i = 0; i < selectedProducts.length; i++) {
                    if (selectedProducts[i].id === selectedProductId) {
                        selectedProducts[i].quantity = selectedProductQuantity;
                        break;
                    }
                }
                displaySelectedProducts();
            }

            function highlightProduct(element) {
                var selectedProductId = element.id;
                var selectedProductQuantity = parseInt(element.querySelector("#quantity").value);
                console.log(selectedProductQuantity);

                var selectedProductName = element.querySelector(".name_product").textContent;
                var selectedProductPriceText = element.querySelector(".original_price").textContent;
                var selectedProductPrice = parseFloat(selectedProductPriceText.replace(/\D/g, ''));
                var checkbox = element.querySelector(".form-check-input");
                var isChecked = checkbox.checked;
                if (!isChecked) {
                    for (var i = 0; i < selectedProducts.length; i++) {
                        if (selectedProducts[i].id === selectedProductId) {
                            selectedProducts.splice(i, 1);
                            break;
                        }
                    }
                } else {
                    var selectedProduct = {
                        id: selectedProductId,
                        name: selectedProductName,
                        quantity: selectedProductQuantity,
                        price: selectedProductPrice
                    };

                    var isExist = false;
                    for (var i = 0; i < selectedProducts.length; i++) {
                        if (selectedProducts[i].id === selectedProductId) {
                            selectedProducts[i].quantity = selectedProductQuantity;
                            isExist = true;
                            break;
                        }
                    }

                    if (!isExist) {
                        selectedProducts.push(selectedProduct);
                    }
                }

                displaySelectedProducts();
            }
            function getProductByID(productId) {
                var filteredProducts = <?php echo json_encode($products); ?>;
                for (var i = 0; i < filteredProducts.length; i++) {
                    if (filteredProducts[i].id === productId) {
                        return filteredProducts[i];
                    }
                }
                return null;
            }

            function displaySelectedProducts() {
                var selectedProductsDiv = document.getElementById("selectedProducts");
                selectedProductsDiv.innerHTML = "";
                var totalPrice = 0;
                var key = 1;
                for (var i = 0; i < selectedProducts.length; i++) {
                    var product = selectedProducts[i];
                    var productId = product.id;
                    var productName = product.name;
                    var productQuantity = product.quantity;
                    var productPrice = product.price;
                    var productTotalPrice = productQuantity * productPrice;
                    totalPrice += productTotalPrice;

                    var html = `
                        <div class="infor-customer-order-div">
                            <span class="infor-customer-order">Sản phẩm ${key++}: </span>
                            <span class="selected-product-name ">${productName}, </span>
                            <span class="infor-customer-order">Số lượng: </span>
                            <span class="selected-product-quantity ">${productQuantity}</span>
                        </div>
                    `;

                    selectedProductsDiv.innerHTML += html;
                }
                var totalHTML = `
                    <div class="">
                        <span><span class="infor-customer-order">Tổng giá: </span>
                        <span class="selected-products-total fs-5">${numberFormat(totalPrice)}  VNĐ</span></p>
                    </div>
                `;
                selectedProductsDiv.innerHTML += totalHTML;
            }

            // hiển thị thông báo trước khi submit
            // $(function() {
            //     $('#show_infor').on('submit', function(event) {
            //         event.preventDefault();
            //         var invalidQuantity = false;
            //         var invalidLoai = false;
            //         var selectedProductCount = 0;

            //         for (var i = 0; i < selectedProducts.length; i++) {
            //             var product = selectedProducts[i];

            //             if (product.quantity < 0 || isNaN(product.quantity)) {
            //                 invalidQuantity = true;
            //             } else if (product.quantity > 0) {
            //                 selectedProductCount++;
            //             }
            //         }

            //         var selectedLoai = $('#loai').val();
            //         if (selectedLoai == 0) {
            //             invalidLoai = true;
            //         }

            //         if (invalidQuantity && invalidLoai) {
            //             alert("Vui lòng chọn ít nhất một sản phẩm và loại gas");
            //             return;
            //         } else if (invalidQuantity) {
            //             alert("Vui lòng nhập số lượng hợp lệ cho sản phẩm đã chọn");
            //             return;
            //         } else if (invalidLoai) {
            //             alert("Vui lòng chọn loại gas");
            //             return;
            //         }

            //         if (selectedProductCount === 0) {
            //             alert("Vui lòng chọn ít nhất một sản phẩm");
            //             return;
            //         }
            //     });
            //     $('#view-order-info').on('click', function(event) {
            //         event.preventDefault();
            //         $('#show_infor').submit();
            //     });
            // });

            function changeInputColor(checkbox) {
                var parentDiv = checkbox.closest('.image-product-order-all');
                if (checkbox.checked) {
                    parentDiv.style.backgroundColor = 'rgb(191 202 220)';
                } else {
                    parentDiv.style.backgroundColor = '';
                }
            }
    </script>

    <script type="text/javascript">
		$(document).ready(function(){
			$("#signupForm").validate({
				rules: {
					nameCustomer: "required",
					phoneCustomer: "required",
					country: "required",
                    state: "required",
                    district: "required",
                    diachi: "required",
                    loai: "required",
				},
				messages: {
					nameCustomer: "Nhập tên",
					phoneCustomer: "Nhập số điện thoại",
					country: "Nhập Tỉnh/TP",
					state: "Nhập Huyện",
					district: "Nhập Phường/Xã",
					diachi: "Nhập hẻm/số nhà",
                    loai: "Chọn loại gas",

				},
				errorElement: "div",
				errorPlacement: function (error, element) {
					error.addClass("invalid-feedback");
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
            $("#submitButton").on("click", function (event) {
                event.preventDefault();
                var invalidQuantity = false;
                var invalidLoai = false;
                var selectedProductCount = 0;
                for (var i = 0; i < selectedProducts.length; i++) {
                    var product = selectedProducts[i];

                    if (product.quantity < 0 || isNaN(product.quantity)) {
                        invalidQuantity = true;
                    } else if (product.quantity > 0) {
                        selectedProductCount++;
                    }
                }
                var selectedLoai = $('#loai').val();
                if (selectedLoai == 0) {
                    invalidLoai = true;
                }
                if (invalidQuantity && invalidLoai) {
                    alert("Vui lòng chọn ít nhất một sản phẩm và loại gas");
                } else if (invalidQuantity) {
                    alert("Vui lòng nhập số lượng hợp lệ cho sản phẩm đã chọn");
                } else if (invalidLoai) {
                    alert("Vui lòng chọn loại gas");
                } else if (selectedProductCount === 0) {
                    alert("Vui lòng chọn ít nhất một sản phẩm");
                } else {
                    $("#signupForm").submit();
                }
            });
        });
	</script>
