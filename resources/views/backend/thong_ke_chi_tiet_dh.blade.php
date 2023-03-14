@extends('layouts.admin_gas')
@section('sidebar-active-thong-ke', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
    <div class="container-fluid">

    <div class="row">

        <!-- hóa đơn -->
        <div class="col-8 mb-4 total-product-initial">
            
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
                </div>
                <div class="col-auto card-icon">
                    <i class="fas fa-calendar-check fa-2x text-danger"></i>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-6 mb-4 mb-4">
            <div class="card statistical-all statistical-all-delivery">
                <div class="row no-gutters" >
                    <div class="col mr-2 p-3 text-light" >
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-danger">
                            Tổng đơn hàng đang giao
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count-all">{{$count_order_delivery}}</span>
                                Đơn hàng
                        </div>
                        <p class="m-0 text-md text-gray-600 text-danger">Tổng số đơn hàng đang giao</p>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fa-solid fa-truck text-success fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 mb-4 mb-4">
            <div class="card statistical-all statistical-all-processing">
                <div class="row no-gutters ">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-dark">
                            Tổng đơn hàng đang xử lý
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count-all">{{$count_order_processing}}</span>
                                Đơn hàng
                        </div>
                        <p class="m-0 text-md text-gray-600 text-dark">Tổng số đơn hàng đang xử lý</p>
                        
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fa fa-spinner text-secondary fs-3" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 mb-4 mb-4">
            <div class="card statistical-all statistical-all-canceled">
                <div class="row no-gutters ">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-info">
                            Tổng đơn hàng đã hủy
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count-all">{{$count_order_canceled}}</span>
                                Đơn hàng
                        </div>
                        <p class="m-0 text-md text-gray-600 text-info">Tổng số đơn hàng đã hủy</p>
                        
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fa-solid fa-ban text-warning fs-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 mb-4 mb-4">
            <div class="card statistical-all statistical-all-delivered">
                <div class="row no-gutters ">
                    <div class="col mr-2 p-3 text-light">
                        <div class="text-xs font-weight-bold text-uppercase mb-1 text-warning">
                            Tổng đơn hàng thành công
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <span class="count-all">{{$count_order_delivered}}</span>
                                Đơn hàng
                        </div>
                        <p class="m-0 text-md text-gray-600 text-warning">Tổng số đơn hàng đã giao thành công</p>
                        
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fa-solid fa-check text-primary fs-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="back-order-statistics" href="{{route('quan-ly-thong-ke')}}"><i class="fa-solid fa-arrow-left"></i> Quay lại</a>

    
    </div>
@endsection

</div>