<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Gas Tech</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <header class="header">
        <div class="grid">
            <div class="header-with">
                <div class="logo-gas-gas">
                    <img src="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}" class="" alt="...">
                </div>
                <div class="header-with-logo">
                    <a href="#" class="header-with-logo__name">
                        <strong class="logo-name-gas">
                            Gas
                        </strong>
                        Tech
                    </a>
                </div>

                <!-- <div class="header-with-search"> -->
                    <div class="header-with-search-header">
                        <form action="" method="POST" id="input_filter" class="header-with-search-form"></form>
                            <i class="header-with-search-icon fas fa-search"></i>
                            <input type="text" id="search_item" name="fullname" autocapitalize="off" class="header-with-search-input" placeholder="Nhập để tìm kiếm">

                        </form>
                    </div>
                <!-- </div> -->

                <div class="header-criteria">
                    <h3 class="header-criteria-h3">Nhanh chóng</h3>
                    <p class="header-criteria-p">Uy tính</p>
                </div>

                <div class="header-criteria-quality">
                    <h3 class="header-criteria-h3">Chất lượng</h3>
                    <p class="header-criteria-p">Đảm bảo</p>
                </div>

                <div class="header-criteria-quality">
                    <h3 class="header-criteria-h3">Miễn phí</h3>
                    <p class="header-criteria-p">Giao hàng</p>
                </div>

                <div class="nav-item dropdown ml-2 nav-item-name-user">
                    @if (Session::get('home'))
                        <p href="#" aria-expanded="true" id="dropdownMenuAcc" data-bs-toggle="dropdown" class="nav-item nav-link user-action header-criteria-h3 name-login-user">
                            @if ($users -> img)
                                <img class="customer-account-image" src="{{ asset('uploads/users/' . $users->img) }}" alt="">
                            @else
                                <img src="{{ asset('frontend/img/logo-login.png') }}" alt="..." width="60px">
                            @endif
                            {{ Session::get('home')['name'] }}
                        </p>
                    @endif
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuAcc">
                        <div class="">
                            <div class="header-with-account-span">
                                <li>
                                    <a href="{{route('logoutuser')}}">
                                        Đăng xuất
                                        <i class="fa-solid fa-right-from-bracket text-warning ps-2"></i>
                                    </a>
                                </li>

                                <li>
                                    <a class="" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Quản lý tài khoản</a>
                                </li>
                                
                            </div>
                        </div>
                    </div>

                    <!-- modal thông tin thay đổi tài khoản -->
                    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-secondary" id="exampleModalToggleLabel">Thông tin tài khoản</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    @if (Session::get('home'))
                                        <div class="modal-account-users">
                                            <form enctype="multipart/form-data" method="post" action="{{ route('update_image_user', $users->id) }}">
                                                @csrf
                                                <div class="d-flex">
                                                    <div class="d-flex mb-3">
                                                        <label class="text-acount-customer col-3" for="">Chọn ảnh:</label>
                                                        <input class="ps-4" type="file" name="img">
                                                    </div>
                                                    <div class="save-img-customer">
                                                        <button class="save-img-customer" type="submit">Lưu</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="d-flex">
                                                <label class="text-acount-customer col-3" for="">Họ tên:</label>
                                                <p class="ps-3">{{ Session::get('home')['name'] }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <label class="text-acount-customer col-3" for="">Tài khoản:</label>
                                                <p class="ps-3">{{ Session::get('home')['email'] }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <label class="text-acount-customer col-3" for="">Mật khẩu:</label>
                                                <p class="ps-3">{{ str_repeat('*', strlen(Session::get('home')['password'])) }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <!--modal click hiển thị thay đổi mật khẩu -->
                                <div class="modal-change-password">
                                    <a href="" class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Đổi mật khẩu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--modal thay đổi mật khẩu -->
                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Thay đổi mật khẩu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="changepassforms" enctype="multipart/form-data" method="post" action="{{ route('update-password-customer', $users->id) }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-4" for="">Nhập Mật khẩu củ: </label>
                                            <input type="password" name="old_password" class="input-password-customer-change">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-4" for="">Nhập Mật khẩu mới: </label>
                                            <input type="password" name="new_password" id="new_password" class="input-password-customer-change">
                                        </div>
                                        <div>
                                            <label class="col-4" for="">Nhập lại Mật khẩu: </label>
                                            <input type="password" name="confirm_password" class="input-password-customer-change">
                                        </div>
                                        <div class="">
                                            <button class="save-password-customer" type="submit">Lưu mật khẩu</button>
                                        </div>
                                    </form>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                        <div class="change-password-customer-home d-flex">
                            <i class="far fa-check-circle icon-check-success"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('mesage'))
                        <div class="success-customer-home-notification d-flex">
                            <i class="fas fa-ban icon-check-cancel"></i>
                            {{ session('mesage') }}
                        </div>
                    @endif

                    
                    <!--  -->
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="web-container">
            <div class="grid-nav">
                <div class="grid-row-12">
                    <div class="home-filter grid" id="filter_button">
                        <a href="{{route('home')}}" data-filter="all">
                            <button class="btnbtn home-filter-button actives" >
                                Trang chủ
                            </button>
                        </a>

                        <button class="btnbtn home-filter-button" data-filter="order_page">
                            Đổi gas
                        </button>

                        <button class="btnbtn home-filter-button" data-filter="guide">
                          Hướng dẫn đổi gas
                        </button>
                        
                        <button class="btnbtn home-filter-button" data-filter="introduce">
                            Giới thiệu
                        </button>

                        <a href="{{route('order-history')}}">
                            <button class="btnbtn home-filter-button" >
                                Lịch sử đơn hàng
                            </button>
                        </a>

                    </div>
                </div>
            </div>

            <div class="header-img-grid element_columns" data-item="img">
                <div id="carouselExampleControls" class="carousel slide grid" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        <div class="carousel-item active slide-main-carousel">
                            <img src="{{asset('frontend/img/qUWlvmuHovb77ZoDTOahjxDTYkzQsqVWP0Ar1UEP.jpg')}}" class="slide-main d-block" alt="...">
                            <div class="gas-advertisement">
                                <div class="gas-advertisement-name ">
                                    <h1 class="gas-advertisement-name-h1">
                                        <span class="logo-name-gas">
                                            Gas
                                        </span>
                                        <span class="tech-name">
                                            Tech
                                        </span>giao gas công nghệ 24/7
                                    </h1>
                                </div>
    
                                <div>
                                    <p class="name-trademark">Nhanh chóng tiện lợi niềm tin của mọi nhà</p>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="carousel-item slide-main-carousel">
                            <img src="{{asset('frontend/img/gas-tank-design.jpg')}}" class="slide-main d-block " alt="...">
                            <div class="gas-advertisement">
                                <div class="gas-advertisement-name ">
                                    <h1 class="gas-advertisement-name-h1 product-nav-span">
                                        </span class="">Sản phẩm chất lượng uy tính hàng đầu<span>
                                    </h1>
                                </div>
    
                                <div>
                                    <p class="name-trademark">Dịch vụ khách hàng tốt, giá cả hợp lí</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="visually-hidden">Previous</span>
                    </button>
    
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="visually-hidden">Next</span>
                    </button>
    
                </div>
            </div>

            <!-- đổi gas -->
            <div class="grid element_column">
                <div class="gas-delivery infor">
                    <div class="card card-infor element_columns" data-item="order_page">
                        <div class="card-header card-heder-name">Đổi gas</div>
                        <div class="card-body gas-delivery-information ">
                        
                            <form id="signupForm" method="post" class="form-horizontal" action="{{route('order-product')}}">
                                @csrf
                                <div class="form-gas-delivery-information" >
                                    <label class="form-label" for="firstname">Tên khách hàng:</label>
                                    <input type="text" class="form-control form-product-specials nameCustomer" id="firstname" name="nameCustomer" value="{{ Session::get('home')['name'] }}" required/>
                                    <label class="form-label" for="number">Số điện thoại khách hàng:</label>
                                    @if (empty($order_product))
                                    <input type="text" class="form-control form-product-specials phoneCustomer" id="number" name="phoneCustomer" />
                                    @else
                                        <input type="text" class="form-control form-product-specials phoneCustomer" id="number" name="phoneCustomer" value="{{ $order_product[0]['phoneCustomer'] }}" />
                                    @endif

                                    <label for="exampleFormControlInput1" class="form-label" >Đỉa chỉ:</label>
                                    <div class="delivery-location form-product-specials form-product-specials-location">
                                        @if (empty($order_product))
                                            <div >
                                                <select onchange="print_state('state',this.selectedIndex);" id="country" name="country" class="country form-select form-control special-product-address" aria-label="Default select example">
                                                </select>
                                            </div>
        
                                            <div>
                                                <select onchange="print_district('district',this.selectedIndex);" name="state" id="state" class="state form-select special-product-address product-address-district" aria-label="Default select example">
                                                </select>
                                            </div>
        
                                            <div>
                                                <select name="district" id="district" class="district form-select special-product-address product-address-district" aria-label="Default select example">
                                                </select>
                                            </div>

                                            <div>
                                                <textarea name="diachi" type="resize:none" class="diachi form-control special-product-address-input special-product-address product-address-district" id="exampleFormControlInput1" placeholder="địa chỉ nhà cụ thể" cols="30" rows="10"></textarea>
                                            </div>
                                        @else
                                            <div id="address">
                                                <div>
                                                    <span class="adress-customer-span">{{$country}}, {{$state}}, {{$district}}, {{$diachi}}</span>
                                                </div>
                                                <div id="change-address">Thay đổi địa chỉ:</div>
                                                <div class="select-address-user hidden">
                                                    <div class="change-addres-user-select">
                                                        <div>
                                                            <select onchange="print_state('state',this.selectedIndex);" id="country" name="country" class="country form-select form-control special-product-address" aria-label="Default select example">
                                                            </select>
                                                        </div>
                    
                                                        <div>
                                                            <select onchange="print_district('district',this.selectedIndex);" name="state" id="state" class="state form-select special-product-address product-address-district" aria-label="Default select example">
                                                            </select>
                                                        </div>
                    
                                                        <div>
                                                            <select name="district" id="district" class="district form-select special-product-address product-address-district" aria-label="Default select example">
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <textarea name="diachi" type="resize:none" class="diachi form-control special-product-address-input special-product-address product-address-district" id="exampleFormControlInput1" placeholder="địa chỉ nhà cụ thể" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <label for="loai" class="form-label">Loại bình gas:</label>
                                    <div class="delivery-location form-product-specials product-type">
                                        <select class="form-select handle_order select-option" id="type" name="type" aria-label="Default select example">
                                            <option  value="0">Chọn loại gas</option>
                                            <option name="cn" value="1">Gas công nghiệp</option>
                                            <option name="dd" value="2">Gas dân dụng</option>
                                        </select>
                                        <div class="product-order-all btnt row" id='results'></div>
                                    </div>

                                    <div class="number-product-order product-address-amount">
                                        <div class="product-address-district" id="amountss">
                                            <label for="loai" class="form-label">Số lượng:</label>
                                            <input type="number" step="1" class="amount quantity" max="50" min="1" name="amount" id="amount">
                                        </div>
                                    </div>

                                    <label for="exampleFormControlInput1" class="form-label ">Ghi chú:</label>
                                    <input class="ghichu form-control form-product-specials notie" id="exampleFormControlInput1" name="ghichu" cols="30" rows="10"></input>
                                    
                                    <div class="col-sm-5 offset-sm-4" id="show_infor">
                                        <div class="col-sm-5 offset-sm-4">
                                            <button class="btn btn-primary submit" id="view-order-info">Tiếp tục</button>
                                        </div>
                                    </div>

                                </div>

                                <!-- hiển thị thông tin đặt hàng trước khi đặt -->
                                <div class="modal fade" id="orderInfoModal" tabindex="-1" aria-labelledby="orderInfoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="orderInfoModalLabel">Thông tin đặt hàng</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex">
                                                    <label class="me-2">Họ Tên: </label>
                                                    <p id="nameCustomer"></p>
                                                </div>

                                                <div class="d-flex">
                                                    <label class="me-2">Số điện thoại: </label>
                                                    <p id="phoneCustomer"></p>
                                                </div>

                                                <div class="d-flex">
                                                    <p class="name-product"></p>
                                                </div>
                                                
                                                <div class="d-flex">
                                                    <label class="me-2">Loại bình gas:  </label>
                                                    <p id="typeCustomer"></p>
                                                </div>
                                                
                                                <div class="d-flex">
                                                    <label class="me-2">Số lượng:  </label>
                                                    <p id="amountCustomer"></p>
                                                </div>

                                                <div class="fw-bolder text-danger">
                                                    <label class="me-2">Tổng tiền:  </label>
                                                    <span class="total-price "></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <h6 class="text-success payment-delivery">Thanh toán khi nhận hàng</h6>
                                                <button class="btn btn-primary submit">Giao gas</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- hướng dẫn đổi gas -->
            <div class="grid element_column">
                <div class="card card-support element_columns infor" data-item="guide">
                    <div class="card-header card-heder-name">Hướng dẫn</div>
                    <div class="support-oder-product">
                        <ul class="support-oder-product-item">
                            <li class="support-oder-product-list">
                                <div class="icon-img">
                                    <img class="img-support-oder" src="https://gas24h.com.vn/themes/gas/ecommerce/images/icon-1.png" alt="">
                                </div>
    
                                <p class="support-text">
                                    <strong>Bước 1:</strong> 
                                    <br>
                                    Vào hệ thống website gastech.com
                                </p>
                            </li>
    
                            <li class="support-oder-product-list">
                                <div class="icon-img">
                                    <i class="fa-solid fa-hand-point-up"></i>
                                </div>
    
                                <p class="support-text">
                                    <strong>Bước 2:</strong> 
                                    <br>
                                    Click chọn ô đổi gas
                                </p>
                            </li >
    
                            <li class="support-oder-product-list">
                                <div class="icon-img">
                                    <i class="fa-solid fa-pencil"></i>
                                </div>
    
                                <p class="support-text">
                                    <strong>Bước 3:</strong> 
                                    <br>
                                    Điền các thông tin vào hệ thống 
                                </p>
                            </li>
    
                            <li class="support-oder-product-list">
                                <div class="icon-img">
                                    <img class="img-support-oder" src="https://gas24h.com.vn/themes/gas/ecommerce/images/icon-4.png" alt="">
                                </div>
    
                                <p class="support-text">
                                    <strong>Bước 4:</strong> 
                                    <br>
                                    Chọn đặt đơn hàng, kết thúc
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            
            <!-- giới thiệu -->
            <div class="grid element_columns element_column" data-item="introduce">
                <div class="card card-support infor">
                    <div class="card-header card-heder-name">Giới thiệu</div>
                    <div class="service-support-client">
                        <span>
                            <strong class="logo-name-gas">Gas</strong> 
                            <strong class="name-gas-tech">Tech</strong> cung cấp các bình gas công nghiệp và gas dân dụng cho các nhà hàng, khách sạn, nhà ăn gia đình..., dịch vụ chất lượng cao an toàn trên tiêu chí “Nhanh chóng - An toàn - Chất lượng - Hiệu quả” Tầm nhìn và sứ mệnh.
                        </span>
                        <ul >
                            <p class="service-client-strong">Dịch vụ:</p>
                            <li class="service-support-client-list">
                                Tư vấn, hướng dẫn miễn phí cho khách hàng.
                            </li>
                            <li class="service-support-client-list">
                                Giao gas nhanh chóng trong khoảng 30 phút, đáp ứng tối đa nhu cầu của quý khách.
                            </li>
                            <li class="service-support-client-list">
                                Đội ngũ kỹ thuật viên, nhân viên giao hàng giàu kinh nghiệm, nhiệt tình, được đào tạo bài bản mang lại hiệu quả cao.
                            </li>
                            <li class="service-support-client-list">
                                Website tiện lợi dễ dàng sử dụng cho mọi khách hàng.
                            </li>
                            <li class="service-support-client-list">
                                Luôn dành nhiều ưu đãi tốt nhất cho khách hàng thân thiết.
                            </li>
                            <li class="service-support-client-list">
                                Cam kết 100% bình gas mà Tech Gas cung cấp là sản phẩm chính hãng, có giấy chứng nhận chất lượng.
                            </li>
                            <li class="service-support-client-list">
                                Giúp khách hàng tiệt kiệm được nhiều thời gian, chỉ cần ở nhà đặt hàng gas sẽ mang tới cho bạn.
                            </li>
                            <li class="service-support-client-list">
                                Đạt được sự tín nhiệm của khách hàng và các đối tác chính là nhân tố quan trọng góp phần vào sự thành công của chúng tôi.
                            </li>
                           <li class="service-support-client-list">
                                Bạn muốn đổi gas chỉ cần lên Gastech.com website giao gas tiện lợi cho mọi khách hàng.
                           </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer">
            <div class="grid">
                <div class="grid-row grid-row-footer">
                    <div class="home-row-column home-row-column-footer">
                        <div class="home-product-image home-product-image-footer">
                            <div class="contact">
                                <span class="contact-support">
                                    Hổ trợ khách hàng
                                </span>
                                <ul class="contact-support-list">
                                    
                                    <li class="contact-support-item">
                                        <i class="contact-support-item-icon-call fas fa-tty"></i>
                                        <a href="tel:0837641469" class="contact-support-item-call-link">
                                            <span>Tư vấn: </span>
                                            0837641469
                                        </a>
                                    </li>

                                    <li class="contact-support-item">
                                        <a href="" class="contact-support-item-call-link">
                                            <i class="fa-solid fa-location-dot icon-location"></i>
                                        </a>
                                        <span class="contact-support-item-call contact-support-item-call-link">Đường 3/2, phường Xuân Khánh, quận Ninh Kiều, thành phố Cần Thơ</span>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="home-row-column home-row-column-footer">
                        <div class="home-product-image home-product-image-footer">
                            <div class="contact">
                                <span class="contact-support">
                                    Theo dõi chúng tôi trên
                                </span>
                                <ul class="contact-support-list">
                                    <li class="contact-support-item">
                                        <i class="contact-support-item-icon-facebook fab fa-facebook"></i>
                                        <a href="#" class="contact-support-item-call-link">
                                            Facebook
                                        </a>
                                    </li>
                                   
                                    <li class="contact-support-item">
                                        <i class="contact-support-item-icon-youtube fab fa-youtube"></i>
                                        <a href="#" class="contact-support-item-call-link">
                                            Youtube
                                        </a>
                                    </li>

                                    <li class="contact-support-item">
                                        <i class="contact-support-item-icon-instagram fa-brands fa-instagram"></i>
                                        <a href="#" class="contact-support-item-call-link">
                                            Instargram
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="home-row-column home-row-column-footer">
                        <div class="home-product-image home-product-image-footer">
                            <div class="contact">
                                <span class="contact-support">
                                    Về chúng tôi
                                </span>
                                <ul class="contact-support-list">
                                    <li class="contact-support-item">
                                        <a href="" class="contact-support-item-call-link">
                                            Hướng dẫn mua hàng
                                        </a>
                                    </li>
                                    <li class="contact-support-item">
                                        <a href="#" class="contact-support-item-call-link">
                                            Giới thiệu
                                        </a>
                                    </li>

                                    <li class="contact-support-item">
                                        <a href="#" class="contact-support-item-call-link">
                                            Đổi gas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="home-row-column home-row-column-footer">
                        <div class="home-product-image home-product-image-footer">
                            <div class="contact">
                                <h4 class="contact-support">
                                Liên hệ cửa hàng
                                </h4>
                                <div class="hot-line">
                                    <a href="tel:19001011">
                                        19001011
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="footer-imge">
                    <div class="footer-imge-license footer-imge-user">
                        © HoangThanh
                    </div>
                </div>
            </div>
    </footer>


    <script src="{{asset('frontend/js/style.js')}}"></script>
    <script src="{{asset('frontend/js/doigas.js')}}"></script>

    <script language="javascript">print_country("country");</script>
    <!-- <script language="javascript">print_type("type");</script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('frontend/js/jquery.validate.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#signupForm").validate({
				rules: {
					nameCustomer: "required",
					phoneCustomer: "required",
					country: "required",
                    state: "required",
                    district: "required",
					dd: "required",
					cn: "required",
                    diachi: "required",
                    amount: "required",
				},
				messages: {
					nameCustomer: "Nhập tên",
					phoneCustomer: "Nhập số điện thoại",
					country: "Nhập địa chỉ",
					state: "Nhập huyện",
					district: "Nhập phường/xã",
					diachi: "Nhập hẻm/số nhà",
					dd: "chọn loại",
					cn: "chọn loại",
                    amount: "Nhập số lượng",
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
        });
	</script>

    <script>
        var handle_order =  document.querySelector('.handle_order');
        var submit =  document.querySelector('.submit');
            handle_order.onchange = ()=>{
                var id = handle_order.value;
                $.ajax({
                    url: "{{route('handle-order')}}",
                    method: "post",
                    data: {
                        id : id,
                        _token: '{{csrf_token()}}',
                    },
                    success: function(html){
                        $("#results").html(html);
                        var idProduct;
                        var product = document.querySelectorAll('.productchoose');
                        var nameCustomer = document.querySelector('.nameCustomer');
                        var phoneCustomer = document.querySelector('.phoneCustomer');
                        var country = document.querySelector('.country');
                        var state = document.querySelector('.state');
                        var district = document.querySelector('.district');
                        var diachi = document.querySelector('.diachi');
                        var amount = document.querySelector('.amount');
                        var ghichu = document.querySelector('.ghichu');
                        var type = document.querySelector('.type');
                        for(let i =0; i< product.length ; i++){
                            product[i].onclick = ()=>{
                            var idProduct = product[i].getAttribute('id');
                            $.ajax({
                                url: "{{route('idProduct')}}",
                                method: "post",
                                data: {
                                    id : idProduct,
                                    _token: '{{csrf_token()}}',
                                },
                                success: function(html){
                                    
                                }
                            })
                            }
                        }
                        submit.onclick = ()=>{
                            $.ajax({
                                url: "{{route('order')}}",
                                method: "post",
                                data: {
                                    nameCustomer : nameCustomer.value,
                                    phoneCustomer : phoneCustomer.value,
                                    country : country.value,
                                    state : state.value,
                                    district : district.value,
                                    diachi : diachi.value,
                                    amount : amount.value,
                                    ghichu : ghichu.value,
                                    type : type.value,
                                    _token: '{{csrf_token()}}',
                                },
                                success: function(html){
                                    
                                }
                            })
                        }

                        var totalPrice = 0;
                        var filter_button = document.querySelectorAll('.productchoose');
                        Array.from(filter_button).forEach(function(element) {
                            element.addEventListener('click', function(event) {
                                for(let i = 0; i < filter_button.length; i++) {
                                    filter_button[i].classList.remove('mystyle');
                                }
                                this.classList.add('mystyle');

                                var name_product = this.querySelector('.name_product');
                                var nameProductElement = document.querySelector('.name-product');
                                nameProductElement.textContent  = name_product.textContent.trim() ;
                                
                                var amountCustomer = document.getElementById("amount").value;
                                if (isNaN(amountCustomer) || amountCustomer == '') {
                                    // console.log("Invalid amount input");
                                    return;
                                }

                                var original_price_element = this.querySelector('.gia');
                                if (original_price_element) {
                                    var original_price = parseInt(original_price_element.innerText.replace(/\D/g,''));
                                } else {
                                    console.log('');
                                }

                                // console.log("original_price:", original_price);
                                totalPrice = original_price * amountCustomer;
                                var totalPriceElement = document.querySelector('.total-price');
                                // console.log("totalPrice:", totalPrice);
                                totalPriceElement.innerText = totalPrice.toLocaleString() + ' đ';
                                
                            });
                        });

                        var amountInput = document.getElementById("amount");
                        amountInput.addEventListener("input", function() {
                        var amountCustomer = amountInput.value;
                        if (isNaN(amountCustomer) || amountCustomer == '') {
                            console.log("Invalid amount input");
                            return;
                        }

                        var totalPriceElement = document.querySelector('.total-price');
                        var selectedProduct = document.querySelector('.mystyle');
                        if (selectedProduct) {
                            var original_price_element = selectedProduct.querySelector('.gia');
                            if (original_price_element) {
                            var original_price = parseInt(original_price_element.innerText.replace(/\D/g,''));
                            totalPrice = original_price * amountCustomer;
                            // console.log("original_price:", original_price);
                            // console.log("totalPrice:", totalPrice);
                            totalPriceElement.innerText = totalPrice.toLocaleString() + ' đ';
                            } else {
                            console.log('');
                            }
                        }
                        });

                        $(function() {
                            $('#show_infor').on('submit', function(event) {
                                event.preventDefault();
                                var nameCustomer = $('#firstname').val();
                                var phoneCustomer = $('#number').val();
                                var typeCustomer = $('#type option:selected').text();
                                var amountCustomer = $('.amount').val();
                                var ghichuCustomer = $('.ghichu').val();
                                $('#nameCustomer').text(nameCustomer);
                                $('#phoneCustomer').text(phoneCustomer);
                                $('#typeCustomer').text(typeCustomer);
                                $('#amountCustomer').text(amountCustomer);
                                $('#orderInfoModal').modal('show');
                            });
                            $('#view-order-info').on('click', function(event) {
                                event.preventDefault();
                                $('#show_infor').submit();
                            });
                        });
                    }
                });
            }
    </script>

    <script>
        var notificationClasses = [
            '.change-password-customer-home',
            '.success-customer-home-notification',
        ];
        function showContent() {
            notificationClasses.forEach(function(classname) {
                var contentBox = document.querySelector(classname);
                if (contentBox) {
                    contentBox.classList.add('show');
                    setTimeout(function() {
                        contentBox.classList.remove('show');
                    }, 6000); 
                }
            });
        }
        @if(session('success'))
            showContent();
        @endif
        @if(session('mesage'))
            showContent();
        @endif
    </script>
      
</body>
</html>
