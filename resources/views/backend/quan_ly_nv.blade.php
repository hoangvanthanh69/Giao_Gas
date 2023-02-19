@extends('layouts.admin_gas')
@section('sidebar-active-customer', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="staff">

          <div class="card-header">
            <span class="product-list-name">Admin / Nhân viên</span>
          </div>

          <div class="card-body">
            <div class="table-responsive table-list-product">

              <div class="add-product-div-admin add-staff-admin">
                <a class="add-staff" href="{{route('add-staff')}}">Thêm Nhân viên</a>
              </div>
              @if (session('mesage'))
                <div class="notification">
                  {{ session('mesage') }}
                </div>
              @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th class="align-center">Họ Tên</th>
                    <th>Mã số </th>
                    <th>Năm sinh</th>
                    <th>Chức vụ</th>
                    <th>Tài khoản gmail@</th>
                    <th class="align-center">Địa chỉ</th>
                    <th>Ngày vào làm</th>
                    <th>Số điện thoại</th>
                    <th class="align-center">Lương/Tháng</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach($staff as $key => $val)
                    <tr class="hover-color">
                        <td class="name-product-td">{{$val['last_name']}}</td>

                        <td class="product-order-quantity">{{$val['id']}}</td>

                        <td class="product-order-quantity">{{$val['birth']}}</td>

                        <td class="roduct-order-quantity"><?php if($val['chuc_vu']==1){echo 'Nhân viên';}else{echo 'Quản lý';}  ?></td>

                        <td class="product-order-quantity">{{$val['taikhoan']}}</td>

                        <td class="product-order-quantity">{{$val['dia_chi']}}</td>


                        <td class="product-order-quantity">{{$val['date_input']}}</td>

                        <td class="product-order-quantity">{{$val['phone']}}</td>

                        <td class="product-order-quantity">{{number_format($val['luong'])}} đ</td>

                        <td class="function-icon function-icon-staff">
                          <form action="{{route('edit-staff', $val['id'])}}">
                            <button class="summit-add-product-button" type='submit'>
                              <i class="fa fa-wrench icon-wrench" aria-hidden="true"></i>
                            </button>
                          </form>
                          
                          <form action="{{route('delete-staff', $val['id'])}}">
                            <button class="summit-add-product-button" type='submit'>
                              <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                            </button>
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
