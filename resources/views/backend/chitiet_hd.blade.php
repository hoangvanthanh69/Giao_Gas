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
                <div class="table-responsive table-list-product">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        
                            <tr class="tr-name-table">
                                <th>Tên Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại bình gas</th>
                                <th>Ảnh</th>
                                <th>SL</th>
                                <th>Giá</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>Tổng giá</th>
                            </tr>
                        
                        </thead>
                        
                        <tbody class="infor">
                        <form enctype="multipart/form-data" method='post' action="{{route('chitiet-hd', $order_product->id)}}">
                            @csrf

                            <tr>
                                <td>{{$order_product['nameCustomer']}}</td>
                                <td>{{$order_product['phoneCustomer']}}</td>
                                <td class="name-product-td">{{$order_product['diachi']}}, {{$order_product['district']}},  {{$order_product['state']}}, {{$order_product['country']}}</td>
                                <td >
                                    {{$order_product['name_product']}}
                                </td>
                                <td><?php if($order_product['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                                <td >
                                    <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$order_product['image']) }}" width="100px"  alt="">
                                    
                                </td>

                                <td>{{$order_product['amount']}}</td>

                                <td >
                                    {{number_format($order_product['price'])}} VNĐ
                                </td>

                                <td>{{$order_product['ghichu']}}</td>

                                <td>
                                    {{$order_product['created_at']}}
                                </td>
                            

                                <td>
                                    <strong>{{number_format($order_product['tong'])}} VNĐ</strong>
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