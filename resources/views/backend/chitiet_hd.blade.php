<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                <span class="product-list-name">Chi tiết đơn hàng</span>
            </div>   

            <div class="card-body">
                <div class="table-responsive ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="tr-name-table">
                                <th>Tên Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Loại bình gas</th>
                                <th>Thông tin sản phẩm</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>Tổng giá</th>
                            </tr>
                        </thead>
                        
                        <tbody class="">
                        <form enctype="multipart/form-data" method='post' action="{{route('chitiet-hd', $order_product->id)}}">
                            @csrf
                            <tr>
                                <div>
                                    <strong for="">Mã Đơn Hàng:</strong>
                                    <span class="ms-2 bg-warning p-1">{{$order_product['order_code']}}</span class="ms-2">
                                </div>
                                <td class="">{{$order_product['nameCustomer']}}</td>
                                <td>{{$order_product['phoneCustomer']}}</td>
                                <td class="name-product-td">{{$order_product['diachi']}}, {{$order_product['district']}},  {{$order_product['state']}}, {{$order_product['country']}}</td>
                                <td><?php if($order_product['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                                <td>
                                @if (!empty($products))
                                    @foreach ($products as $product)
                                        <div class="d-flex">
                                            <span class="col-2">
                                                <img class="image-admin-product-order"  src="{{asset('uploads/product/'.$product['product']->image )}}" width="70%" height="70%" alt="">  
                                            </span>
                                            <span class="col-5">
                                                {{ $product['product_name']}}
                                            </span>
                                            <span class="col-4">
                                                <span>Giá:</span>
                                                    {{ number_format($product['product_price']) }} đ
                                            </span>
                                            <span class="col-1">
                                                <span>SL:</span>
                                                {{ $product['quantity'] }}
                                            </span>
                                        </div>
                                        @endforeach
                                @endif
                                </td>

                                <td>{{$order_product['ghichu']}}</td>

                                <td>
                                    {{$order_product['created_at']}}
                                </td>
                            

                                <td class="">
                                    <strong>{{number_format($order_product['tong'])}} đ</strong>
                                </td>
                                
                            </tr>
                        </form>

                        </tbody>
                    </table>
                </div>
            </div>
           
            <div class="back-add-product-chitie">
                <a class="back-product back-product-chitiet" href="{{route('quan-ly-hd')}}">Trở lại</a>
            </div>
            <div>
                <a target="blan" href="{{url('/print-order/'.$order_product->id)}}">In hóa đơn </a>
            </div>
        </div>

            
    </div>
</div>

</body>