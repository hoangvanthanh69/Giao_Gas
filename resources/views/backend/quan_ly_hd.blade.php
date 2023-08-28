@extends('layouts.admin_gas')
@section('sidebar-active-orders', 'active')
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="receipt">

          <div class="card-header">
            <span class="product-list-name"><a class="text-decoration-none" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-hd')}}">Đơn hàng</a></span>
          </div>

          <div class="d-flex justify-content-between pt-3">
            <form method="get"> 
              <div class="d-flex">
                <select name="status" id="status" class="form-select select-form-option" onchange="this.form.submit()">
                  <option value="all" {{ ($filters['status'] == 'all') ? 'selected' : '' }}>Tất cả</option>
                  <option value="1" {{ ($filters['status'] == '1') ? 'selected' : '' }}>Đang xử lý</option>
                  <option value="2" {{ ($filters['status'] == '2') ? 'selected' : '' }}>Đang giao</option>
                  <option value="3" {{ ($filters['status'] == '3') ? 'selected' : '' }}>Đã giao</option>
                  <option value="4" {{ ($filters['status'] == '4') ? 'selected' : '' }}>Đã hủy</option>
                </select>

                <div id="loai" class="d-flex m-3">
                  <div class="form-check me-5 ms-4">
                    <input class="form-check-input" type="radio" name="loai" value="1" id="type1" {{ ($filters['loai'] == '1') ? 'checked' : '' }} onclick="this.form.submit();">
                    <label class="form-check-label" for="type1">Gas công nghiệp</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="loai" value="2" id="type2" {{ ($filters['loai'] == '2') ? 'checked' : '' }} onclick="this.form.submit();">
                    <label class="form-check-label" for="type2">Gas dân dụng</label>
                  </div>
                </div>

                

                <div class="ms-4 export-file-pdf">
                  <a href=""> <i class="fa-solid fa-file-export"></i> Xuất PDF</a>
                </div>
              </div>
            </form>
            
            <div class="export-file-excel">
              <form action="{{route('export-excel')}}" method="POST">
                @csrf
                <button type="submit" value="" name="export_csv" class="export-file-excel-button">
                  <i class="fa-solid fa-file-export"></i>Xuất Excel
                </button>
              </form>
            </div>

            <div class="search-infor-amdin-form mt-2 me-4">
              <form action="{{ route('admin.search_hd') }}" method="GET" class="header-with-search-form ">
                @csrf
                <i class="search-icon-discount fas fa-search"></i>
                <input type="text" autocapitalize="off" class="header-with-search-input header-with-search-input-discount" placeholder="Tìm kiếm" name="search">
                <span class="header_search button" onclick="startRecognition()">
                  <i class="fas fa-microphone" id="microphone-icon"></i> 
                </span>
              </form>
              @if (session('mesage'))
                <div class="success-customer-home-notification d-flex">
                  <i class="fas fa-ban icon-check-cancel"></i>
                  {{ session('mesage') }}
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
            @if (session('mesages'))
              <div class="notification-search">
                {{ session('mesages') }}
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
                    <th>Thanh toán</th>
                    <th>Người giao</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                @php
                    $statusFilter = $filters['status'] ?? 'all';
                    $typeFilter = $filters['loai'] ?? 'all';
                @endphp
                  @foreach($order_product as $key => $val)
                  @if (($statusFilter == 'all' || $val['status'] == $statusFilter) && ($typeFilter == 'all' || $val['loai'] == $typeFilter))
                      <tr class="order-product-height hover-color">
                        <td class="order-product-infor-admin">{{$key+1}}</td>
                        <td class="order-product-infor-admin"> {{$val['order_code']}}</td>
                        <td class="order-product-infor-admin">{{$val['nameCustomer']}}</td>
                        <td class="order-product-infor-admin">{{$val['phoneCustomer']}}</td>
                        <td class="order-product-infor-admin"><?php if($val['loai']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>

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
                        <td class="order-product-infor-admin"> <?php if($val['payment_status']==1){echo 'Khi nhận hàng';}else{echo 'Online VNPAY';}  ?></td>
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
                            <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val['id']}}">
                              <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$val['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Bạn có chắc muốn xóa đơn hàng này</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                    <button class="summit-add-room-button btn btn-primary" type='submit'>Xóa</button>
                                  </div>
                                </div>
                              </div>
                            </div>
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
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
