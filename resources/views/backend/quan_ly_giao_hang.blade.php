@extends('layouts.admin_gas')
@section('sidebar-active-giao-hang', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="receipt">

          <div class="card-header">
                <span class="product-list-name">Admin / Giao hàng</span>
          </div>
          <div>
            
          </div>

            <div class="card-body">
                <div class="table-responsive table-list-product">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="tr-name-table-list">
                                <th>Mã Đơn</th>
                                <th>Tên Khách hàng</th>
                                <th>Địa chỉ</th>
                                <th>Tên sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Giao nhân viên</th>
                            </tr>
                            
                        </thead>
                        
                        <tbody class="infor">
                        @foreach($order_product as $key => $val)
                            <tr class="order-product-height hover-color">
                                <td class="order-product-infor-admin">{{$val['id']}}</td>
                                <td class="order-product-infor-admin">{{$val['nameCustomer']}}</td>
                                <td class="order-product-infor-admin">{{$val['diachi']}}, {{$val['district']}},  {{$val['state']}}, {{$val['country']}}</td>
                                <td class="order-product-infor-admin">{{$val['name_product']}}</td>
                                <td class="order-product-infor-admin">
                                    @if($val['status']==1)
                                        <span style="color: orange;">Đang xử lý</span>
                                    @elseif($val['status']==2)
                                        <span style="color: #52de20;">Đang giao</span>
                                    @endif
                                </td>
                                <td class="order-product-infor-admin">
                                    <form method="POST" action="{{route('quan_ly_giao_hangs')}}">
                                        @csrf
                                        {{$val['admin_name']}}
                                        <select name="admin_name" class="form-control" onchange="this.form.submit()">
                                            <option value="">Chọn</option>
                                            @foreach($tbl_admin as $admin)
                                                @if($admin -> chuc_vu != 2)
                                                    <option value="{{$admin->admin_name}}">{{$admin-> admin_name}}</option>
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
        