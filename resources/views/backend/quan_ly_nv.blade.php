@extends('layouts.admin_gas')
@section('sidebar-active-customer', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="staff">

          <div class="card-header">
            <span class="product-list-name"><a class="text-decoration-none" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-nv')}}">Nhân viên</a></span>
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
                    <th class="align-center col-1">Ảnh</th>
                    <th class="align-center col-2">Họ Tên</th>
                    <th class="align-center col-1">SĐT</th>
                    <th class="col-1 align-center">Năm sinh</th>
                    <th class="col-1 align-center">Chức vụ</th>
                    <th class="align-center col-1">Tài khoản @gmail</th>
                    <th class="align-center col-2">Địa chỉ</th>
                    <th class="col-1 ">Ngày vào làm</th>
                    <th class="align-center col-1">Lương/Tháng</th>
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

                        <td class="product-order-quantity">{{$val['phone']}}</td>

                        <td class="product-order-quantity">{{$val['birth']}}</td>

                        <td class="roduct-order-quantity">
                          <?php if($val['chuc_vu']==1){echo "<span style='color: #d0c801; font-weight: 500'>Giao hàng</span>";} 
                          elseif($val['chuc_vu']==3){echo "<span style='color: #1bd64b; font-weight: 500'>Biên tập</span>";} 
                          else{echo "<span style='color: #e7055c; font-weight: 500'>Quản lý</span>";}  ?>
                        </td>

                        <td class="product-order-quantity">{{$val['taikhoan']}}</td>

                        <td class="product-order-quantity">{{$val['dia_chi']}}</td>

                        <td class="product-order-quantity">{{$val['date_input']}}</td>

                        <td class="product-order-quantity">{{number_format($val['luong'])}} VNĐ</td>

                        <td class="function-icon function-icon-staff">
                          <form action="{{route('edit-staff', $val['id'])}}">
                            <button class="summit-add-product-button" type='submit'>
                              <i class="fa-solid fa-pen-to-square"></i>
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
