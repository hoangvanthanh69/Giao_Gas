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
                    <div class="row list-order-user-history">
                        <div  class="col-1 infor-order-user-history">
                            <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$order_product['image']) }}" width="70%" height="70%" alt="">       
                        </div>
                        <div class="col-2 infor-order-user-history">{{$order_product['name_product']}}</div>
                        <div class="col-2 infor-order-user-history"><?php if($order_product['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></div>
                        <div class="col-2 infor-order-user-history">{{$order_product['created_at']}}</div>
                        <div class="col-1 infor-order-user-history">{{number_format($order_product['price'])}}</div>
                        <div class="col-1 infor-order-user-history">x{{$order_product['amount']}}</div>
                        <div class="col-3 infor-order-user-history"> Thành tiền:
                            <span class="total-order-user-history">{{number_format($order_product['amount'] * $order_product['price'])}} đ</span>
                        </div>
                    </div>
                </form>
                <div class="button-history-orders">
                    <a class="back-order-statistics" href="{{route('order-history')}}">
                        <i class="fa-solid fa-arrow-left"></i>
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>