@extends('layouts.admin_gas')
@section('sidebar-active-home', 'active' )
@section('content')

<div class="col-10 nav-row-10 ">
    <div class="container-fluid">

    <div class="row">
        <!-- sản phẩm -->
        <div class="col-4 min-height-prodcuct">
            <div class="statistical-all img-admin-chart">
                <img class="img-statistical-admin img-statistical-product" src="{{asset('backend/img/png-clipart-line-chart-graph-of-a-function-line-angle-text-thumbnail.png')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng sản phẩm
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{$count_product}}</span>
                            Sản phầm
                        </div>

                        <div class="mb-0 text-warning">
                            <span class="count-product">{{$count_product1}}</span>
                            sản phẩm gas công nghiệp
                        </div>
                        
                        <div class="mb-0 text-info">
                            <span class="count-product">{{$count_product2}}</span>
                            sản phẩm gas dân dụng
                        </div>

                        <div class="mb-0 text-info">
                            <span class="count-product">{{$product_all}}</span>
                            Tổng số lượng sản phẩm
                        </div>

                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-database fa-2x "></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- đơn hàng-->
        <div class="col-4 min-height-prodcuct">
            <div class="statistical-all img-admin-chart">
                <img class="img-statistical-admin img-statistical-order" src="{{asset('backend/img/images-pie.png')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng đơn hàng
                        </div>
                        <div class="h5 mb-2 font-weight-bold text-gray-800">
                            <span class="count-all">{{$count_order}}</span>
                            Đơn hàng
                        </div>
                        <a class="back-order-statistics" href="{{route('thong_ke_chi_tiet_dh')}}">Xem chi tiết</a>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-calendar-check fa-2x text-danger"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- nhân viên -->
        <div class="col-4 min-height-prodcuct">
            <div class="statistical-all img-admin-chart ">
                <img class="img-statistical-admin img-statistical-staff" src="{{asset('backend/img/28-280057_flat-icon-bar-graphics-statistics-chart-graph-graph.png')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin ">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng nhân viên
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{$count_staff}}</span> 
                            Nhân viên
                        </div>

                        <div class="mb-0 text-Warning">
                            <span class="count-product">{{$count_staff_chuvu2}}</span>
                            Quản lý
                        </div>
                        
                        <div class="mb-0 text-dark">
                            <span class="count-product">{{$count_staff_chuvu1}}</span>
                            Giao gas
                        </div>

                        <div class="mb-0 text-Info">
                            <span class="count-product">{{$count_staff_chuvu3}}</span>
                            Biên tập
                        </div>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-users fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- tổng doanh thu -->
        <div class="col-4 min-height-prodcuct">
            <div class="statistical-all bg-total-product img-admin-chart">
                <img class="img-statistical-admin" src="{{asset('backend/img/Graph-PNG-Transparent-Image.png')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng Doanh thu 
                        </div>
                        <div class="h5 mb-2 font-weight-bold text-gray-800">
                            <span class="count-all">{{number_format($tong_gia)}} đ</span>
                        </div>
                        <a class="back-order-statistics" href="{{route('chi_tiet_doanh_thu')}}">Xem chi tiết</a>
                    </div>
                    <div class="col-auto card-icon text-success" style="font-size: 38px;">
                        <i class="fa-sharp fa-solid fa-money-check-dollar"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- tong sp ban ra -->
        <div class="col-4 ">
            <div class="statistical-all img-admin-chart">
            <img class="img-statistical-admin img-statistical-sell-products" src="{{asset('backend/img/candlestick-trading-graph-isolated-png-transparent-background-investing-stocks-market-buy-sell-sign-vector-illustration-224529770.jpg')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng giá sản phẩm bán ra
                        </div>
                        <div class="h5 mb-0 font-weight-bold ">
                            <span class="count-all saleprice-product">{{number_format($data_original_price)}} đ</span> 
                        </div>
                    </div>
                    <div class="col-auto card-icon text-Warning" style="font-size: 38px;">
                        <i class="fa-solid fa-money-bill"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- tong gia sp ban dau -->
        <div class="col-4  total-product-initial">
            <div class="statistical-all img-admin-chart">
                <img class="img-statistical-admin img-statistical-total-products" src="{{asset('backend/img/lovepik-pie-chart-png-image_400509540_wh1200.png')}}" alt="">
                <div class="row no-gutters infor-statisticala-admin ">
                    <div class="col mr-2 p-3 text-info">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                            Tổng giá ban đầu nhập
                        </div>
                        <div class="mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{number_format($data_price)}} đ</span>
                        </div>

                        <div class="mb-0 text-Warning">
                            <span class="count-price">{{number_format($data_price1)}} đ</span> 
                            Gas công nghiệp
                        </div>

                        <div class="mb-0 text-light">
                            <span class="count-price">{{number_format($data_price2)}} đ</span> 
                            Gas dân dụng
                        </div>
                            
                    </div>

                </div>
            </div>
        </div>

        <!-- sản phẩm bán chạy -->
        <div class="col-6">
            <div class="card statistical-all bg-Secondary">
                <div class="row no-gutters ">
                    <div class="col mr-2 text-light center-total-product m-3">
                        <div class="text-xs fw-bolder text-uppercase mb-1 text-dark">
                            Sản phẩm bán chạy nhất hệ thống
                        </div>
                        <table class="table">
                            <tbody>
                                <thead>
                                    <tr class="text-center">
                                        <th>STT</th>
                                        <th>Mã SP</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                    </tr>
                                </thead>
                                @foreach ($bestseller as $key => $sp) 
                                    <tr class="text-light text-center">
                                        <td>{{$key+1}}</td>
                                        <td>{{$sp->idProduct}}</td>
                                        <td>{{$sp->name_product}}</td>
                                        <td>{{$sp->total_amount}}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- khách hàng thân thiết -->
        <div class="col-6">
            <div class="card statistical-all bg-Secondary">
                <div class="row no-gutters ">
                    <div class="col mr-2 text-light center-total-product m-3">
                        <div class="text-xs fw-bolder text-uppercase mb-1 text-light">
                            Khách hàng thân thiết
                        </div>
                        <table class="table">
                            <tbody>
                                <thead>
                                    <tr class="text-center text-light">
                                        <th>STT</th>
                                        <th>Tên Khách hàng</th>
                                        <th>Số đơn hàng</th>
                                    </tr>
                                </thead>
                                @foreach ($loyal_customer as $key => $sp) 
                                    <tr class="text-center list-loyal-customer">
                                        <td>{{$key+1}}</td>
                                        <td class="">{{$sp->nameCustomer}}</td>
                                        <td class="">{{$sp->total_amounts}}</td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

</div>