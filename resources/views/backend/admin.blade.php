@extends('layouts.admin_gas')
@section('sidebar-active-home', 'active' )
@section('content')

<div class="col-10 nav-row-10 ">
    <div class="width-admin">
    <div class="row">
        <!-- sản phẩm -->
        <div class="col-4 min-height-prodcuct">
            @if (session('success'))
                <div class="change-password-customer-home d-flex">
                <i class="far fa-check-circle icon-check-success"></i>
                {{ session('success') }}
                </div>
            @endif
            @if (session('message'))
                <div class="success-customer-home-notification d-flex">
                <i class="fas fa-ban icon-check-cancel"></i>
                {{ session('message') }}
                </div>
            @endif
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
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-calendar-check fa-2x text-danger"></i>
                    </div>
                    <div class="text-center">
                        <a class="back-order-statistics" href="{{route('thong_ke_chi_tiet_dh')}}">Xem chi tiết
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
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
                            <span class="count-all">{{number_format($tong_gia)}} VNĐ</span>
                        </div>
                    </div>
                    <div class="col-auto card-icon text-success" style="font-size: 38px;">
                        <i class="fa-sharp fa-solid fa-money-check-dollar"></i>
                    </div>
                    <div class="text-center">
                        <a class="back-order-statistics" href="{{route('chi_tiet_doanh_thu')}}">Xem chi tiết
                            <i class="fa-solid fa-circle-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- tong gia sp ban dau -->
        <div class="col-4 min-height-prodcuct total-product-initial">
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
        <div class="col-4 min-height-prodcuct">
            <div class="card border-loyal-customers bg-product-selling">
                <div class="row no-gutters total-product-selling">
                    <div class="col mr-2 text-light center-total-product m-3">
                        <div class="text-xs fw-bolder text-uppercase mb-1 text-dark">
                            Sản phẩm bán chạy nhất hệ thống
                        </div>
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Mã</th>
                                    <th>Tên SP</th>
                                    <th>SL bán</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach ($popularProducts as $key  => $product)
                                    <tr class="text-center">
                                        <td>{{ $product['product_id'] }}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>{{ $product['quantity'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- biểu đồ doanh thu 12 tháng gần đây -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
        <div class="revenue-chart-months min-height-prodcuct">
            <canvas id="revenueChart"></canvas>
        </div>
        <!-- khách hàng thân thiết -->
        <div class="col-4 min-height-prodcuct loyal-customers">
            <div class="card border-loyal-customers">
                <div class="row no-gutters total-loyal-customers">
                    <div class="col mr-2 text-light center-total-product m-3">
                        <div class="text-xs fw-bolder text-uppercase mb-1 text-dark">
                            Khách hàng thân thiết
                        </div>
                        <table class="table text-dark">
                            <thead>
                                <tr class="text-center ">
                                    <th>Tên Khách hàng</th>
                                    <th>SĐT</th>
                                    <th>Số đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td>11111111</td>
                                    <td>11111111</td>
                                    <td>11111111</td>
                                </tr>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch('/revenue-chart')
    .then(response => response.json())
    .then(data => {
        let months = data.months;
        let revenue = data.revenue;
        months = months.map(month => {
            const date = new Date(month);
            const formattedMonth = `${date.getMonth() + 1}/${date.getFullYear()}`;
            return formattedMonth;
        });
        fetch('/revenue-for-current-month')
        .then(response => response.json())
        .then(currentMonthRevenue => {
            const currentDate = new Date();
            const currentMonth = currentDate.getMonth() + 1;
            const currentYear = currentDate.getFullYear();
            const currentMonthString = `${currentMonth}/${currentYear}`;
            revenue.push(currentMonthRevenue);
            // months.push(currentMonthString);
            const ctx = document.getElementById('revenueChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: [
                        {
                            label: 'Doanh thu',
                            data: revenue,
                            fill: false,
                            borderColor: '#2679A0',
                        },
                    ],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Tháng',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Doanh thu',
                            },
                        },
                    },
                },
            });
        });
    });
</script>