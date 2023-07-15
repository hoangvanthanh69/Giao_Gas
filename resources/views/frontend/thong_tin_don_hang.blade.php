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
    <div class="history-list grid">
        <div class="row main-row container-fluid main-row-chitiet">
            <div class="card-header-chitiet">
                <h4 class="product-list-name">Thông tin đơn hàng</h4>
            </div>

            <div class="">
                <form enctype="multipart/form-data" method='post' action="{{route('thong_tin_don_hang', $order_product->id)}}">
                    @csrf
                    <div class="infor-order-customer-detail">
                        <h6 class="infor-address-delivery-customer">
                            <i class="fa-solid fa-location-dot"></i>
                            Địa chỉ nhận hàng
                        </h6>
                        <h6 class="text-success">{{$order_product['nameCustomer']}}</h6>
                        <h6 class="text-success">(+84) {{$order_product['phoneCustomer']}}</h6>
                        <p class="name-product-p">{{$order_product['diachi']}}, Phường {{$order_product['district']}}, Quận {{$order_product['state']}}, Thành Phố {{$order_product['country']}}</p>
                    </div>
                    <div class="d-flex">
                        <div class="col-3 d-flex ">
                            <span class="pb-4 pe-1">Đơn hàng: {{$order_product['order_code']}}</span>
                        </div>
                        <div class="col-3 ps-3">Loại: <?php if($order_product['loai']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></div>
                        <div class="col-3">Đặt ngày: {{$order_product['created_at']}}</div>
                    </div>

                    <div class="d-flex list-order-user-history">
                        <div class="col-7">
                            @if (!empty($products))
                                @foreach ($products as $product)
                                    <div class="row">
                                        <div class="col-1 me-4 infor-order-user-history">
                                            <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$product['product']->image )}}" width="70%" height="70%" alt="">       
                                        </div>
                                        <div class="col-4 infor-order-user-history ms-3">{{ $product['product_name']}}</div>
                                        <div class="col-3 infor-order-user-history">{{ number_format($product['product_price']) }} VNĐ</div>
                                        <div class="col-3 infor-order-user-history">Số lượng: {{ $product['quantity'] }}</div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-5 total-order-customer-infor"> 
                            <h5>Tổng cộng</h5>
                            <div class="row">
                                <div class="col-7">Tổng tiền ({{$productCount}} sản phẩm)</div>
                                <div class="col-5">{{number_format($order_product['tong'])}} VNĐ</div>
                            </div>
                            <div class="row">
                                <div class="col-7">Phí vận chuyển (miễn phí)</div>
                                <div class="col-5">0 VNĐ</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-7">Khuyến mãi giảm giá</div>
                                <div class="col-5">0 VNĐ</div>
                            </div>
                            <div class="row">
                                <div class="col-7">Tổng cộng :</div>
                                <div class="col-5"><strong>{{number_format($order_product['tong'])}} VNĐ</strong></div>
                                <span class="text-warning">Hình thức thanh toán khi nhận hàng</span>
                            </div>
                            
                        </div>
                    </div>
                    <h6 class="text-danger mt-4">Người giao hàng</h6>
                    <div class="infor-deliver-customers d-flex text-center mb-2">
                        @if ($delivery_info)
                        <div class="col-1">
                            <img class="image-admin-product-edit"  src="{{asset('uploads/staff/'.$delivery_info['image_staff'])}}" width="100px"  alt="{{ $delivery_info->admin_name }}">
                        </div>
                        <div class="col-2">
                            <p class="name-product-p">{{$order_product['admin_name']}}</p>
                        </div>
                        <div>
                            <div class="star-ratings">
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <?php
                                    $star_color = '';
                                    if ($i <= $average_rating) {
                                        $star_color = 'checked';
                                    } elseif ($i - $average_rating < 0.5) {
                                        $star_color = 'half-checked';
                                    }
                                    ?>
                                    <i class="fa fa-star <?php echo $star_color; ?>"></i>
                                <?php } ?>
                            </div>
                        </div>
                        @else
                            <span class="text-muted">Chưa có người giao</span>
                        @endif
                        <div class="col-3">
                            <span>
                                <?php 
                                    if ($order_product['status'] == 1) {
                                        echo '<p style="color: #52de20;">Đang chuẩn bị hàng</p>';
                                    }
                                    else if ($order_product['status'] == 2) {
                                        echo '<p style="color: #52de20;">Đang giao</p>';
                                    }
                                    else if ($order_product['status'] == 3) {
                                        echo '<p style="color: #198754;">Giao hàng thành công</p>';
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                </form>
                @if ($delivery_info)
                    @if ($danh_gia)
                        <p>Đánh giá của bạn:
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $danh_gia->rating)
                                    <i class="fa fa-star text-warning"></i>
                                @else
                                    <i class="star-rating fa fa-star"></i>
                                @endif
                            @endfor
                        </p>

                        <!-- <div id="change-rating">Thay đồi đánh giá</div>
                        <div class="select-address-user hidden">
                            <form enctype="multipart/form-data" method='post' action="{{route('danh_gia_giao_hangs', $delivery_info->id)}}">
                                @csrf
                                <input type="hidden" name="staff_id" value="{{ $delivery_info->id }}">
                                <input type="hidden" name="order_id" value="{{ $order_product->id }}">
                                <span>Đánh giá:</span>    
                                <div class="rating mb-1" id="signupForm">
                                    <i class="star star-rating fa fa-star" data-value="1"></i>
                                    <i class="star star-rating fa fa-star" data-value="2"></i>
                                    <i class="star star-rating fa fa-star" data-value="3"></i>
                                    <i class="star star-rating fa fa-star" data-value="4"></i>
                                    <i class="star star-rating fa fa-star" data-value="5"></i>
                                    <input type="hidden" name="rating" class="rating-value" value="">
                                </div>
                                <div class="comment-rating-staff">
                                    <label class="mb-2" for="Comment">Nhận xét của bạn:</label>
                                    <textarea class="comment-user-staff" id="Comment" name="Comment" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" id="submit-rating">Gửi đánh giá</button>
                            </form>
                        </div> -->
                        
                    @else
                        <form enctype="multipart/form-data" method='post' action="{{route('danh_gia_giao_hangs', $delivery_info->id)}}">
                            @csrf
                            <input type="hidden" name="staff_id" value="{{ $delivery_info->id }}">
                            <input type="hidden" name="order_id" value="{{ $order_product->id }}">
                            <span>Đánh giá:</span>    
                            <div class="rating mb-1" id="signupForm">
                                <i class="star star-rating fa fa-star" data-value="1"></i>
                                <i class="star star-rating fa fa-star" data-value="2"></i>
                                <i class="star star-rating fa fa-star" data-value="3"></i>
                                <i class="star star-rating fa fa-star" data-value="4"></i>
                                <i class="star star-rating fa fa-star" data-value="5"></i>
                                <input type="hidden" name="rating" class="rating-value" value="">
                            </div>
                            <div class="comment-rating-staff">
                                <label class="mb-2" for="Comment">Nhận xét của bạn:</label>
                                <textarea class="comment-user-staff" id="Comment" name="Comment" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2" id="submit-rating">Gửi đánh giá</button>
                        </form>
                    @endif
                @endif

                @if (session('success'))
                    <div class="notification-orders">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="button-history-orders">
                    <a class="back-order-statistics" href="{{route('order-history')}}">
                        <i class="fa-solid fa-arrow-left"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
    
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
</body>
<script src="{{asset('frontend/js/style.js')}}"></script>
</html>

<script>
    // hiển thị thông báo khi không chọn sao
    function validateRating() {
        const ratingValue = document.querySelector('.rating-value').value;
        if (!ratingValue) {
            alert('Bạn phải chọn số sao trước khi gửi đánh giá!');
            return false;
        }
        return true;
    }
    document.querySelector('#submit-rating').addEventListener('click', function(event) {
        if (!validateRating()) {
            event.preventDefault();
        }
    });

    // thêm class vào các sao khi click chọn
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.querySelector('.rating-value');
    stars.forEach(star => {
    star.addEventListener('click', () => {
        const value = star.getAttribute('data-value');
        ratingInput.value = value;
        stars.forEach(s => {
            if (s.getAttribute('data-value') <= value) {
                s.classList.add('selected');
            } else {
                s.classList.remove('selected');
            }
        });
        });
    });

    // thay đổi đánh giá
    document.getElementById("change-rating").addEventListener("click", function() {
        var selectAddressUser = document.querySelector(".select-address-user");
        document.querySelector('.select-address-user').style.display = 'block';
        if (selectAddressUser.classList.contains("hidden")) {
        selectAddressUser.classList.remove("hidden");
        } else {
        selectAddressUser.classList.add("hidden");
        }
    });
    
</script>