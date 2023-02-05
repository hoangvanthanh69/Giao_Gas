@extends('layouts.admin_gas')
@section('sidebar-active-orders', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">
        <div class="card mb-3 product-list element_column" data-item="receipt">
          <div class="card-header">
            <span class="product-list-name">Admin / Đơn hàng</span>
          </div>
          <div class="card-body">
            <div class="table-responsive table-list-product">
            @if (session('mesage'))
                <div class="notification-order">
                  {{ session('mesage') }}
                </div>
              @endif
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
                    <tr class="order-product-height hover-color">
                      <td>{{$val['nameCustomer']}}</td>
                      <td>{{$val['phoneCustomer']}}</td>
                      <td><?php if($val['type']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                      
                      <td>
                        {{$val['created_at']}}
                      </td>

                      <td >
                        {{$val['id']}}
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
        