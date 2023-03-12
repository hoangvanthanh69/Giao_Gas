@extends('layouts.admin_gas')
@section('sidebar-active-home', 'active' )
@section('content')

<div class="col-10 nav-row-10 ">

      <div class="container-fluid">
        <div class="row">
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
                        <p class="m-0 text-md text-gray-600 text-dark">Tổng số sản phẩm được quản lý</p>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-database fa-2x "></i>
                    </div>
                    </div>
                </div>
            </div>

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
                        <p class="m-0 text-md text-gray-600 text-danger">Tổng số hóa đơn bán hàng trong tháng</p>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-calendar-check fa-2x text-danger"></i>
                    </div>
                    </div>
                </div>
            </div>

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
                        <p class="m-0 text-md text-gray-600 text-success">Tổng số nhân viên được quản lý</p>
                    </div>
                    <div class="col-auto card-icon">
                        <i class="fas fa-users fa-2x text-success"></i>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <!-- tìm kiếm -->
        <div class="header-with-search">

          <div class="header-with-search-header">
            <form action="" method="POST" id="input_filter" class="header-with-search-form"></form>
                <input type="text" id="search_item" name="fullname" autocapitalize="off" class="header-with-search-input" placeholder="Tìm kiếm">
                <span class="header__search button">
                  <i class="header-with-search-icon fas fa-search"></i>
                </span>
            </form>
          </div>  

        </div>

        <div class="card mb-3 product-list element_column " data-item="product">
          <div class="card-header">
            <span class="product-list-name btnbtn">Gas</span>
          </div>
          <div class="card-body">
            
            <div class="table-responsive table-list-product">
              <div class="add-product-div-admin">
                <a class="add-product" href="{{route('add-product-admin')}}">Thêm sản phẩm</a>
              </div>
                @if (session('success'))
                    <div class="notification">
                        {{ session('success') }}
                    </div>
                @endif
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Loại gas</th>
                    <th>Số lượng</th>
                    <th>Giá ban đầu</th>
                    <th>Giá bán</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                

                <tbody class="infor">
                  @foreach($product as $key => $val)

                    <tr >
                      <td class="name-product-td infor-product">{{$val['name_product']}}</td>
                      <td class="img-product-td">
                        <img class="image-admin-product-edit"  src="uploads/product/{{$val['image']}}" width="100px"  alt="">
                      </td>
                      <td class="name-product-td infor-product"><?php if($val['loai']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                      <td class="name-product-td infor-product">{{$val['quantity']}}</td>
                      <td class="name-product-td infor-product">{{number_format($val['price'])}} đ</td>
                      <td class="name-product-td infor-product">{{number_format($val['original_price'])}} đ</td>
                      
                      
                      <td class="function-icon">
                        <form action="{{route('edit-product', $val['id'])}}">
                          <button class="summit-add-product-button infor-product" type='submit'>
                            <i class="fa fa-wrench icon-wrench" aria-hidden="true"></i>
                          </button>
                        </form>
                        
                        <form action="{{route('delete-product', $val['id'])}}">
                          <button class="summit-add-product-button infor-product" type='submit'>
                            <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    

                  @endforeach 
                  

                  
                </tbody>
                <h1 id="showtext">

              </table>
            </div>
          </div>
        </div>

        <div class="card mb-3 product-list element_column" data-item="staff">

          <div class="card-header">
            <span class="product-list-name">Nhân viên</span>
          </div>

          <div class="card-body">
            <div class="table-responsive table-list-product">

              <div class="add-product-div-admin add-staff-admin">
                <a class="add-staffs" href="{{route('add-staff')}}">Thêm Nhân viên</a>
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
                    <th>Năm sinh</th>
                    <th>Chức vụ</th>
                    <th>Tài khoản gmail@</th>
                    <th class="align-center">Địa chỉ</th>
                    <th>Mã số </th>
                    <th>Ngày vào làm</th>
                    <th>Số điện thoại</th>
                    <th class="align-center">Lương/Tháng</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach($staff as $key => $val)
                    <tr>
                        <td class="name-product-td">{{$val['last_name']}}</td>

                        <td class="product-order-quantity">{{$val['birth']}}</td>

                        <td class="roduct-order-quantity"><?php if($val['chuc_vu']==1){echo 'Nhân viên';}else{echo 'Quản lý';}  ?></td>

                        <td class="product-order-quantity">{{$val['taikhoan']}}</td>

                        <td class="product-order-quantity">{{$val['dia_chi']}}</td>

                        <td class="product-order-quantity">{{$val['date_input']}}</td>

                        <td class="product-order-quantity">{{$val['phone']}}</td>

                        <td class="product-order-quantity">{{$val['luong']}}</td>

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

        <div class="card mb-3 product-list element_column" data-item="receipt">
          <div class="card-header">
            <span class="product-list-name">Đơn hàng</span>
          </div>
          <div class="card-body">
            <div class="table-responsive table-list-product">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr class="tr-name-table">
                      <th>Tên Khách hàng</th>
                      <th>Số điện thoại</th>
                      <th >Loại bình gas</th>
                      <th >Ngày tạo</th>
                      <th >Mã SP</th>
                      <th >Giá</th>
                      <th>Chức năng</th>
                    </tr>
                    
                </thead>
                
                <tbody class="infor">
                  @foreach($order_product as $key => $val)
                    <tr class="order-product-height">
                      <td>{{$val['nameCustomer']}}</td>
                      <td>{{$val['phoneCustomer']}}</td>
                      <td><?php if($val['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                      
                      <td>
                        {{$val['created_at']}}
                      </td>

                      <td >
                        {{$val['idProduct']}}
                      </td> 

                      <td>
                        {{number_format($val['price'])}} đ
                      </td>
                      
                      <td class="function-icon">
                          <a class="browse-products" href="{{route('chitiet-hd', $val['id'])}}">
                           Xem chi tiết
                          </a>
                          <form action="{{route('delete-client', $val['id'])}}">
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