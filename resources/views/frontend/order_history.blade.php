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
<div class="history-list">
    <div class="row main-row container-fluid main-row-chitiet">
        <div class="mb-3 product-list element_column" data-item="receipt">
            <div class="card-header-chitiet">
                <h4 class="product-list-name">Lịch sử đơn hàng</h4>
            </div>

            <div class="history-status-nav">
                <a href="?status=all" class="{{ ($status == 'all') ? 'activess' : '' }}">Tất cả đơn hàng</a>
                <a href="?status=1" class="{{ ($status == '1') ? 'activess-1' : '' }}">Đang xử lý</a>
                <a href="?status=2" class="{{ ($status == '2') ? 'activess-2' : '' }}">Đang giao</a>
                <a href="?status=3" class="{{ ($status == '3') ? 'activess-3' : '' }}">Đã giao</a>
                <a href="?status=4" class="{{ ($status == '4') ? 'activess-4' : '' }}">Đã hủy</a>
            </div>

            <div class="card-body history-orders-list">
                @foreach($order_product as $key => $val)
                    
                    @if ($status == 'all' || $val['status'] == $status)
                        
                        <div class="row list-order-user-history">
                            <a href="{{route('thong_tin_don_hang', $val['id'])}}" class="col-11 row link-infor-order-user-history">
                                <div  class="col-2 infor-order-user-history">
                                    <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$val['image']) }}" width="70%" height="70%" alt="">       
                                </div>
                                <div class="col-3 infor-order-user-history">{{$val['name_product']}}</div>
                                <div class="col-2 infor-order-user-history"><?php if($val['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></div>
                                <div class="col-2 infor-order-user-history">x{{$val['amount']}}</div>
                                <div class="col-2 infor-order-user-history"> Thành tiền:
                                    <span class="total-order-user-history">{{number_format($val['amount'] * $val['price'])}} đ</span>
                                </div>
                            </a>

                            <div class="col-1 status-order-user-history">
                                <div class="infor-order-user-history">
                                    <div>
                                        <?php 
                                            if ($val['status'] == 1) {
                                                echo '<span style="color: orange;">Đang xử lý</span>';
                                                echo "<a href='" . route('cancel_order', ['id' => $val['id']]) . "'class='btn-cancel-order'>Hủy đơn</a>";
                                            }
                                            else if ($val['status'] == 2) {
                                                echo '<span style="color: #52de20;">Đang giao</span>';
                                            }
                                            else if ($val['status'] == 3) {
                                                echo '<span style="color: rgb(216, 17, 179);">Đã giao</span>';
                                            }
                                            else if ($val['status'] == 4) {
                                                echo '<span style="color: red;">Đã hủy</span>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            
                                
                               
                        </div>
                    @endif
                @endforeach

                            @if (session('message'))
                                <div class="notification-orders">
                                    {{ session('message') }}
                                </div>
                            @endif
                       

                    
                    <div class="button-history-orders">
                        <div class="history-button-back">
                            <a class="" href="{{route('home')}}">Mua tiếp</a>
                        </div>
                    </div>
                    
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
</html>