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

            <div class="card-body history-orders-list">
                <div class="table-responsive table-list-product">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-infor-history">
                            <tr>
                                <th class="infor-name">Mã</th>
                                <th class="infor-name">Sản phẩm</th>
                                <th class="infor-name">Ảnh</th>
                                <th class="infor-name">Loại bình gas</th>
                                <th class="infor-name">Ngày đặt</th>
                                <th class="infor-name">SL</th>
                                <th class="infor-name">Giá</th>
                                <th class="infor-name">Tổng</th>
                                <th class="infor-name">Trạng thái</th>
                                
                            </tr>
                        </thead>
                    
                        <tbody class="history-order-product">
                            @foreach($order_product as $key => $val)
                                <tr class="">
                                    <td>{{$val['id']}}</td>
                                    <td>{{$val['name_product']}}</td>
                                    <td>
                                        <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$val['image']) }}" width="100px"  alt="">       
                                    </td>
                                    <td><?php if($val['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                                    <td>{{$val['created_at']}}</td>
                                    <td>{{$val['amount']}}</td>
                                    <td>{{number_format($val['price'])}}</td>
                                    <td>
                                    {{number_format($val['amount'] * $val['price'])}} đ
                                    </td>
                                    <td>
                                        <?php 
                                            if ($val['status'] == 1) {
                                                echo '<span style="color: orange;">Đang xử lý</span>';
                                                echo "<a href='" . route('cancel_order', ['id' => $val['id']]) . "'class='btn-cancel-order'>Hủy đơn hàng</a>";
                                            }
                                            else if ($val['status'] == 2) {
                                                echo '<span style="color: #52de20;">Đang giao</span>';
                                            }
                                            else if ($val['status'] == 3) {
                                                echo '<span style="color: blue;">Đã giao</span>';
                                            }
                                            else if ($val['status'] == 4) {
                                                echo '<span style="color: red;">Đã hủy</span>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            @endforeach

                            @if (session('message'))
                                <div class="notification-orders">
                                    {{ session('message') }}
                                </div>
                            @endif
                        </tbody>
                    </table>
                    <div class="button-history-orders">
                        <div class="history-button-back">
                            <a class="" href="{{route('home')}}">Quay lại trang chủ</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>

</body>