@extends('layouts.admin_gas')
@section('sidebar-active-thong-ke', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
    <div class="container-fluid">

    <div class="row">

        <!-- sản phẩm -->
        <div class="col-4 mb-4">
            <div class="card statistical-all bg-success">
                <div class="row no-gutters ">
                <div class="col mr-2 p-3 text-light">
                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
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

        <!-- hóa đơn -->
        <div class="col-4 mb-4">
            <div class="card statistical-all bg-warning">
                <div class="row no-gutters ">
                <div class="col mr-2 p-3 text-light">
                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-danger">
                        Tổng đơn hàng / tháng
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{$count_order}}</span>
                            Đơn hàng
                    </div>
                    <p class="m-0 text-md text-gray-600 text-danger">Tổng số đơn hàng</p>
                    <a class="back-order-statistics" href="{{route('thong_ke_chi_tiet_dh')}}">Xem chi tiết</a>
                </div>
                <div class="col-auto card-icon">
                    <i class="fas fa-calendar-check fa-2x text-danger"></i>
                </div>
                </div>
            </div>
        </div>

        <!-- nhân viên -->
        <div class="col-4 mb-4">
            <div class="card statistical-all bg-info">
                <div class="row no-gutters ">
                <div class="col mr-2 p-3 text-light">
                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-success">
                        Tổng nhân viên
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{$count_staff}}</span> 
                            Nhân viên
                    </div>

                    <div class="mb-0 text-success">
                        <span class="count-product">{{$count_staff_chuvu2}}</span>
                        Quản lý
                    </div>
                    
                    <div class="mb-0 text-dark">
                        <span class="count-product">{{$count_staff_chuvu1}}</span>
                        Nhân viên
                    </div>
                </div>
                <div class="col-auto card-icon">
                    <i class="fas fa-users fa-2x text-success"></i>
                </div>
                </div>
            </div>
        </div>

        <!-- tổng doanh thu trong một tháng -->
        <div class="col-6 mb-4">
            <div class="card statistical-all bg-dark">
                <div class="row no-gutters ">
                <div class="col mr-2 p-3 text-light">
                    <div class="text-xs font-weight-bold text-uppercase mb-1 text-light">
                        Tổng Doanh thu / tháng
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <span class="count-all">{{number_format($tong_gia)}} đ</span>
                    </div>

                    <div class="mb-0 text-info">
                        Tổng doanh thu trong một tháng
                    </div> 
                    
                </div>
                <div class="col-auto card-icon text-success" style="font-size: 38px;">
                    <i class="fa-sharp fa-solid fa-money-check-dollar"></i>
                </div>
                </div>
            </div>
        </div>
        
        <!-- tong gia trung binh sp ban ra -->
        <div class="col-6 mb-4">
            <div class="card statistical-all bg-total-product">
                <div class="row no-gutters ">

                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-warning">
                            Tổng giá sản phẩm bán ra
                        </div>
                        <div class="h5 mb-0 font-weight-bold ">
                                <span class="count-all saleprice-product">{{number_format($data_original_price)}} đ</span> 
                                Giá sản phẩm bán ra
                        </div>
                        <p class="m-0 text-md text-gray-600 text-dark">Tổng giá tiền bán sản phẩm</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- tong gia sp ban dau -->
        <div class="col-8 mb-4 total-product-initial">
            <div class="card statistical-all">
                <div class="row no-gutters ">
                    <div class="col mr-2 p-3 text-info">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-success">
                            Tổng giá ban đầu với số lượng từng sản phẩm 
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span class="count-all">{{number_format($data_price)}} đ</span> 
                            Giá sản phẩm ban đầu nhập
                        </div>

                        <div class="mb-0 text-danger">
                            <span class="count-price">{{number_format($data_price1)}} đ</span> 
                            tổng giá sản phẩm gas công nghiệp
                        </div>

                        <div class="mb-0 text-light">
                            <span class="count-price">{{number_format($data_price2)}} đ</span> 
                            tổng giá sản phẩm gas dân dụng
                        </div>
                    </div>

                </div>
            </div>
        </div>

        
    </div>
    
    </div>
@endsection

</div>