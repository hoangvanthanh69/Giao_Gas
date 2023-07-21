@extends('layouts.admin_gas')
@section('sidebar-active-giao-hang', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="receipt">

            <div class="card-header">
                <span class="product-list-name"><a class="text-decoration-none" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-giao-hang')}}">Giao hàng</a></span>
            </div>
            <div class="card-body">
                <div class="table-responsive table-list-product">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="tr-name-table-list">
                                <th>Mã ĐH</th>
                                <th>Tên Khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Thông tin sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Giao nhân viên</th>
                            </tr>
                            
                        </thead>
                        
                        <tbody class="infor">
                        @foreach($order_product as $key => $val)
                            <tr class="order-product-height hover-color">
                                <td class="col-1">{{$val['order_code']}}</td>
                                <td class="col-2">{{$val['nameCustomer']}}</td>
                                <td class="col-2">{{$val['diachi']}}, {{$val['district']}},  {{$val['state']}}, {{$val['country']}}</td>
                                <td class="col-4">{{$val['infor_gas']}}</td>
                                <td class="col-1">
                                    @if($val['status']==1)
                                        <span style="color: orange;">Đang xử lý</span>
                                    @elseif($val['status']==2)
                                        <span style="color: #52de20;">Đang giao</span>
                                    @endif
                                </td>
                                <td class="col-2">
                                    <form method="POST" action="{{route('quan_ly_giao_hangs')}}">
                                        @csrf
                                        {{$val['admin_name']}}
                                        <select name="admin_name" class="form-control" onchange="this.form.submit()">
                                            <option value="">Chọn</option>
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach($tbl_admin as $admin)
                                                @if($admin -> chuc_vu == 1)
                                                    @php
                                                        $count ++;
                                                    @endphp
                                                    <option value="{{$admin->admin_name}}">{{$count}} {{$admin-> admin_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="id" value="{{ $val['id'] }}">
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
             </div>
        </div>


@endsection
        