@extends('layouts.admin_gas')
@section('sidebar-active-orders', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="receipt">

          <div class="card-header">
            <span class="product-list-name">Admin / Đơn hàng</span>
          </div>

          <div>
            <form method="get"> 
              <select name="status" id="status" class="form-select select-form-option" onchange="this.form.submit()">
                <option value="all" {{ (isset($_GET['status']) && $_GET['status'] == 'all') ? 'selected' : '' }}>Tất cả đơn hàng</option>
                <option value="1" {{ (isset($_GET['status']) && $_GET['status'] == '1') ? 'selected' : '' }}>Đang xử lý</option>
                <option value="2" {{ (isset($_GET['status']) && $_GET['status'] == '2') ? 'selected' : '' }}>Đang giao</option>
                <option value="3" {{ (isset($_GET['status']) && $_GET['status'] == '3') ? 'selected' : '' }}>Đã giao</option>
                <option value="4" {{ (isset($_GET['status']) && $_GET['status'] == '4') ? 'selected' : '' }}>Đã hủy</option>
              </select>
            </form>
          </div>
          
          <div class="card-body">
            <div class="table-responsive table-list-product">
            @if (session('success'))
                <div class="notification-order">
                  {{ session('success') }}
                </div>
            @endif
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    <tr class="tr-name-table bg-info">
                      <th >Mã</th>
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
                  @foreach($order_product as $key => $val)
                  
                    @if ($status == 'all' || $val['status'] == $status)
                    
                      <tr class="order-product-height hover-color">
                        <td class="order-product-infor-admin"> {{$val['id']}}</td>
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
        