<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}">
    <link rel="stylesheet" href="{{asset('backend/css/home_admin.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
<div class="main ">
    <div class="row main-row container-fluid main-row-chitiet">
        <div class="card mb-3 product-list element_column" data-item="receipt">
            <div class="card-header card-header-chitiet">
                <span class="product-list-name">Lịch sử đơn hàng</span>
            </div>   

            <div class="card-body">
                <div class="table-responsive table-list-product">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="tr-name-table">
                            <th>Khách hàng</th>
                            <th>Điện thoại</th>
                            <th>Sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Loại bình gas</th>
                            <th>Ngày đặt</th>
                            <th>SL</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                            <th>Trạng thái</th>
                            </tr>
                        </thead>
                    
                        <tbody class="infor">
                            @foreach($order_product as $key => $val)
                                <tr class="order-product-height hover-color">
                                    <td>{{$val['nameCustomer']}}</td>
                                    <td>{{$val['phoneCustomer']}}</td>
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
                                    <td >
                                        <?php if($val['status']==1){echo 'Đang xử lý';}  ?>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="" href="{{route('home')}}">Trở lại</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>