@extends('layouts.admin_gas')
@section('sidebar-active-customer', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="staff">

          <div class="card-header">
            <span class="product-list-name">Admin / Nhân viên</span>
          </div>

          <div class="search-option-infor-amdin">

            <div class="add-product-div-admin add-staff-admin">
              <a class="add-staffs" href="{{route('add-staff')}}">Thêm Nhân viên</a>
            </div>

            <div class="search-infor-amdin-form">
                <form action="{{ route('admin.search_order') }}" method="GET" class="header-with-search-form ">
                  @csrf
                  <input type="text" autocapitalize="off" class="header-with-search-input" placeholder="Tìm kiếm" name="search">
                  <span class="header_search button">
                    <i class="header-with-search-icon fas fa-search"></i>
                  </span>
                </form>
            </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive table-list-product">

              @if (session('mesage'))
                <div class="notification">
                  {{ session('mesage') }}
                </div>
              @endif

              @if (session('mesages'))
                <div class="notification-search">
                  {{ session('mesages') }}
                </div>
              @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th>Mã số </th>
                    <th class="align-center">Ảnh</th>
                    <th class="align-center">Họ Tên</th>
                    <th>Năm sinh</th>
                    <th>Chức vụ</th>
                    <th class="align-center">Tài khoản @gmail</th>
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
                      <td class="product-order-quantity">{{$val['id']}}</td>

                      <td class="img-product-td">
                        <img class="image-admin-product-edit"  src="{{asset('uploads/staff/'.$val['image_staff'])}}" width="100px"  alt="">
                      </td>

                        <td class="name-product-td">{{$val['last_name']}}</td>

                        <td class="product-order-quantity">{{$val['birth']}}</td>

                        <td class="roduct-order-quantity">
                          <?php if($val['chuc_vu']==1){echo "<span style='color: #d0c801; font-weight: 500'>Giao hàng</span>";} 
                          elseif($val['chuc_vu']==3){echo "<span style='color: #1bd64b; font-weight: 500'>Biên tập</span>";} 
                          else{echo "<span style='color: #e7055c; font-weight: 500'>Quản lý</span>";}  ?>
                        </td>

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
              <nav aria-label="Page navigation example" class="nav-link-page">
                <ul class="pagination">
                  @for ($i = 1; $i <= $staff->lastPage(); $i++)
                    <li class="page-item{{ ($staff->currentPage() == $i) ? ' active' : '' }}">
                      <a class="page-link a-link-page" href="{{ $staff->url($i) }}">{{ $i }}</a>
                    </li>
                  @endfor
                </ul>
              </nav>
            </div>
          </div>
        </div>

@endsection
