@extends('layouts.admin_gas')
@section('sidebar-active-orders', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="receipt">

          <div class="card-header">
            <span class="product-list-name">Admin / Đơn hàng</span>
          </div>

          <div class="d-flex justify-content-between">
            <form method="get"> 
              <div class="d-flex">
                <select name="status" id="status" class="form-select select-form-option" onchange="this.form.submit()">
                  <option value="all" {{ ($filters['status'] == 'all') ? 'selected' : '' }}>Trạng thái</option>
                  <option value="1" {{ ($filters['status'] == '1') ? 'selected' : '' }}>Đang xử lý</option>
                  <option value="2" {{ ($filters['status'] == '2') ? 'selected' : '' }}>Đang giao</option>
                  <option value="3" {{ ($filters['status'] == '3') ? 'selected' : '' }}>Đã giao</option>
                  <option value="4" {{ ($filters['status'] == '4') ? 'selected' : '' }}>Đã hủy</option>
                </select>

                <div id="type" class="d-flex m-3">
                  <div class="form-check me-5">
                    <input class="form-check-input" type="radio" name="type" value="1" id="type1" {{ ($filters['type'] == '1') ? 'checked' : '' }} onclick="this.form.submit();">
                    <label class="form-check-label" for="type1">Gas công nghiệp</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" value="2" id="type2" {{ ($filters['type'] == '2') ? 'checked' : '' }} onclick="this.form.submit();">
                    <label class="form-check-label" for="type2">Gas dân dụng</label>
                  </div>
                </div>
              </div>
            </form>
            <div class="search-infor-amdin-form mt-2 me-4">
              <form action="{{ route('admin.search_hd') }}" method="GET" class="header-with-search-form ">
                @csrf
                <input type="text" autocapitalize="off" class="header-with-search-input" placeholder="Tìm kiếm" name="search">
                <span class="header_search button">
                  <i class="header-with-search-icon fas fa-search"></i>
                </span>
              </form>
              @if (session('mesages'))
                <div class="notification-search">
                  {{ session('mesages') }}
                </div>
              @endif
            </div>
          </div>
          
          <div class="card-body">
            <div class="table-responsive table-list-product">
            @if (session('success'))
                <div class="notification-order">
                  {{ session('success') }}
                </div>
            @endif
              <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%">
                <thead>
                  <tr class="tr-name-table bg-info">
                    <th>STT</th>
                    <th >Mã ĐH</th>
                    <th>Tên Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th >Loại bình gas</th>
                    <th >Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Người giao</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                @php
                    $statusFilter = $filters['status'] ?? 'all';
                    $typeFilter = $filters['type'] ?? 'all';
                @endphp
                  @foreach($order_product as $key => $val)
                  @if (($statusFilter == 'all' || $val['status'] == $statusFilter) && ($typeFilter == 'all' || $val['type'] == $typeFilter))
                      <tr class="order-product-height hover-color">
                        <td class="order-product-infor-admin">{{$key+1}}</td>
                        <td class="order-product-infor-admin"> {{$val['order_code']}}</td>
                        <td class="order-product-infor-admin">{{$val['nameCustomer']}}</td>
                        <td class="order-product-infor-admin">{{$val['phoneCustomer']}}</td>
                        <td class="order-product-infor-admin"><?php if($val['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>

                        <td class="order-product-infor-admin">
                          {{$val['created_at']}}
                        </td>
                        <td class="order-product-infor-admin">
                          <form method='POST' class="status-order-admin-form" action="{{route('status_admin', $val['id'])}}"> 
                            @csrf
                              <select class="select-option-update" onchange="this.form.submit()" name="status">
                                <option value="1" <?php echo  ($val['status'] == 1 ? 'selected' : ''); ?>> Đang xử lý</option>
                                <option value="2" <?php echo ($val['status'] == 2 ? 'selected' : ''); ?>> Đang giao</option>
                                <option value="3" <?php echo ($val['status'] == 3 ? 'selected' : ''); ?>> Đã giao</option>
                                <option value="4" <?php echo ($val['status'] == 4 ? 'selected' : ''); ?>> Đã hủy</option>
                              </select>
                          </form>
                        </td>
                        <td class="order-product-infor-admin">
                          {{$val['admin_name']}}
                          @if($val['status'] != 3 && $val['admin_name'] != 'Chưa có người giao' && $val['admin_name'] != 'Người giao hủy')
                            <a href="{{route('cancel_delivery', $val['id'])}}" class='cancel-delivery'>
                              <i class="ps-2 fs-5 fa-solid fa-xmark"></i>
                            </a>
                            <h6 class="cancel-delivery-orders">Không nhận đơn giao</h6>
                          @endif
                        </td>

                        <td class="function-icon ">
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
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection
        
