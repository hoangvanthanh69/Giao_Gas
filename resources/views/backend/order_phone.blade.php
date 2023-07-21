@extends('layouts.admin_gas')
@section('sidebar-active-add-order', 'active' )
@section('content')
    <div class="col-10">
        <div class="">
            <h5 class="text-center color-logo-gas mt-4">Thêm đơn hàng mới từ số điện thoại</h5>
        </div>

        <div class="row show-infor-product-orders">
            <div class="col-5 ps-5 text-light">
                <form id="signupForm" enctype="multipart/form-data" method='post' action="{{route('add-order')}}">
                    @csrf
                    
                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Số điện thoại:</label>
                        <input class="infor-customer-input col-12" type="text" name="phone" id="phone">
                    </div>

                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Họ và Tên:</label>
                        <input class="infor-customer-input col-12" type="text" name="last_name" id="last_name">
                    </div>

                    <div class=" mt-4">
                        <label class="name-add-product-customer-all" for="">Đỉa chỉ:</label>
                        <div class="d-flex address-customer-form">
                            <input class="col-3 address-customer-input" type="text" name="country" id="country" placeholder="Tỉnh/TP">
                
                            <input class="col-3 address-customer-input" type="text" name="state" id="state" placeholder="Quận/Huyện">

                            <input class="col-3 address-customer-input" type="text" name="district" id="district" placeholder="Phường/Xã">

                            <textarea class="col-3 address-customer-input" type="text" name="diachi" id="diachi" placeholder="địa chỉ"></textarea>
                        </div>
                    </div>

                    <div class="mt-4 ">
                        <label class="name-add-product-customer-all" for="">Loại gas:</label>
                        <div class= "p-0">
                        <select class="form-select handle_order select-option" id="loai" name="loai" aria-label="Default select example" onchange="showProductsByType(this)">
                            <option value="0">Chọn loại gas</option>
                            <option value="1" name="cn">Gas công nghiệp</option>
                            <option value="2" name="dd">Gas dân dụng</option>
                        </select> 
                        </div>
                            
                    </div>

                    <div class="mt-4 ">
                        <label class="name-add-product-customer-all" for="">Giảm giá:</label>
                        <div class= "p-0">
                            <select id="type" name="type" class="form-select " aria-label="Default select example">
                                <option value="0">Chọn voucher</option>
                            </select>    
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Tổng giá:</label>
                        <input class="infor-customer-input col-12" type="text" name="luong">
                    </div>

                    <div class="mt-4">
                        <a class="" href="{{route('quan-ly-nv')}}">Trở lại</a>
                    </div>
                    
                </form>
            </div>

            <div class="col-7 mt-1 pt-3">
                <div class="container">
                    <div class="search-prodcut-order-phone">
                        <input type="text" autocapitalize="off" class="header-with-search-input" placeholder="Tìm kiếm" name="search" id="searchInput" onkeyup="searchProducts(this.value)">
                    </div>
                    <div class="row g-2 product-order-all mb-3" id="infor_gas">
                        <!-- Thông tin sản phẩm sẽ được hiển thị -->
                    </div>
                </div>
            </div>
            
        </div>
@endsection
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#phone').on('blur', function() {
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
                            $('#last_name').val(response.customerName);
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
                        <div class="p-3 border border-danger image-product-order-all">
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

            // hiển thị thông tin trước khi submit
            $(function() {
                $('#show_infor').on('submit', function(event) {
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
                        return;
                    } else if (invalidQuantity) {
                        alert("Vui lòng nhập số lượng hợp lệ cho sản phẩm đã chọn");
                        return;
                    } else if (invalidLoai) {
                        alert("Vui lòng chọn loại gas");
                        return;
                    }

                    if (selectedProductCount === 0) {
                        alert("Vui lòng chọn ít nhất một sản phẩm");
                        return;
                    }
                    var nameCustomer = $('#firstname').val();
                    var phoneCustomer = $('#number').val();
                    var typeCustomer = $('#loai option:selected').text();
                    var ghichuCustomer = $('.ghichu').val();
                    $('#nameCustomer').text(nameCustomer);
                    $('#phoneCustomer').text(phoneCustomer);
                    $('#typeCustomer').text(typeCustomer);
                    $('#orderInfoModal').modal('show');
                });
                $('#view-order-info').on('click', function(event) {
                    event.preventDefault();
                    $('#show_infor').submit();
                });
            });

            function changeInputColor(checkbox) {
                var parentDiv = checkbox.closest('.image-product-order-all');
                if (checkbox.checked) {
                    parentDiv.style.backgroundColor = '#E8F0FE';
                } else {
                    parentDiv.style.backgroundColor = '';
                }
            }
    </script>
