@extends('layouts.admin_gas')
@section('sidebar-active-tk-user', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
<div class="d-flex mb-3 card">
   <div class="card-header">
      <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-tk-user')}}">Quản lý khách hàng</a></span>
   </div>
   <div class="card-body">
      <div class="table-responsive ">
         <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="float-end d-flex">
                     <h5 class="list-account-admin color-logo-gas">Danh sách đặt qua số điện thoại</h5> 
                     <button class="carousel-next-list-customer ms-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     </button>
                  </div>
                  <h5 class="list-account-admin">Danh sách khách hàng đặt online</h5> 
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                     <thead class="">
                        <tr class="tr-name-table">
                           <th class="">STT</th>
                           <th class="">Họ tên</th>
                           <th class="">SĐT</th>
                           <th class="">Tài khoản</th>
                           <th class="">Địa chỉ</th>
                           <th class="">Số đơn</th>
                           <th class="">Tổng tiền
                              <select aria-label="Default select example" class="select-filter-month-total" onchange="filterOrderHistory(this.value)">
                                 <option value="0" {{ ($filter == 0) ? 'selected' : '' }}>Tất cả</option>
                                 <option value="1" {{ ($filter == 1) ? 'selected' : '' }}>1 tháng gần nhất</option>
                                 <option value="3" {{ ($filter == 3) ? 'selected' : '' }}>3 tháng gần nhất</option>
                                 <option value="6" {{ ($filter == 6) ? 'selected' : '' }}>6 tháng gần nhất</option>
                                 <option value="12" {{ ($filter == 12) ? 'selected' : '' }}>1 năm gần nhất</option>
                              </select>
                           </th>
                           <th>Chức năng</th>
                        </tr>
                     </thead>
                     <tbody class="infor table-list-product">
                        @foreach($combinedData as $key => $val)
                           <tr class="">
                              <td>{{$key+1}}</td>
                              <td class="product-order-quantity">{{$val['user']['name']}}</td>
                              <td>
                                    {{$val['user']['phone']}}
                              </td>
                              <td class="product-order-quantity">{{$val['user']['email']}}</td>
                              <td> 
                                 @if($val['state'] != null)
                                    {{$val['diachi']}}, {{$val['district']}}, {{$val['state']}}
                                 @else
                                    Không có
                                 @endif
                              </td>
                              <td class="product-order-quantity">{{$val['order_count']}}</td>
                              <td>
                                 {{number_format($val['orderProductSum'])}} <span class="text-decoration-underline">đ</span>
                              </td>
                              <td class="product-order-quantity">
                                 <form action="{{route('delete_account_users', $val['user']['id'])}}">
                                    <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $val['user']['id']}}">
                                       <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $val['user']['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <div class="modal-header">
                                                <h5 class="modal-title text-danger" id="exampleModalLabel">Bạn có chắc muốn xóa sản phẩm này</h5>
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
                        @endforeach 
                     </tbody>
                  </table>
               </div>
               <div class="carousel-item">
                  <div class="float-end d-flex">
                     <h5 class="list-account-admin color-logo-gas">Danh sách khách hàng đặt online</h5> 
                     <button class="carousel-next-list-customer ms-2" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     </button>
                  </div>
                     <h5 class="list-account-admin ">Danh sách khách hàng đặt qua số điện thoại</h5> 
                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="">
                           <tr class="tr-name-table">
                              <th class="">STT</th>
                              <th class="">Họ tên</th>
                              <th class="">SĐT</th>
                              <th>Địa chỉ</th>
                              <th>Số đơn</th>
                              <th>Tổng tiền
                                 <!-- <select aria-label="Default select example" class="select-filter-month-total" onchange="filterOrderHistory(this.value)">
                                    <option value="0" {{ ($filter == 0) ? 'selected' : '' }}>Tất cả</option>
                                    <option value="1" {{ ($filter == 1) ? 'selected' : '' }}>1 tháng gần nhất</option>
                                    <option value="3" {{ ($filter == 3) ? 'selected' : '' }}>3 tháng gần nhất</option>
                                    <option value="6" {{ ($filter == 6) ? 'selected' : '' }}>6 tháng gần nhất</option>
                                    <option value="12" {{ ($filter == 12) ? 'selected' : '' }}>1 năm gần nhất</option>
                                 </select> -->
                              </th>
                              <th>Chức năng</th>
                           </tr>
                        </thead>
                        <tbody class="infor table-list-product">
                           @foreach($order_products_null_user as $key => $val)
                              <tr class="">
                                 <td>{{$key+1}}</td>
                                 <td class="product-order-quantity">{{$val['nameCustomer']}}</td>
                                 <td>{{$val['phoneCustomer']}}</td>
                                 <td> {{$val['diachi']}}, {{$val['district']}}, {{$val['state']}}</td>
                                 <td class="product-order-quantity"> {{ $orderCounts[$val->user_id]['orderCount'] ?? 0 }}</td>
                                 <td>{{ number_format($orderCounts[$val->user_id]['totalValue'] ?? 0) }} <span class="text-decoration-underline">đ</span></td>
                                 <td class="product-order-quantity">
                                    <form action="">
                                       <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                          <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                                       </button>
                                       <!-- Modal -->
                                       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <h5 class="modal-title text-danger" id="exampleModalLabel">Bạn có chắc muốn xóa sản phẩm này</h5>
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
                           @endforeach 
                        </tbody>
                     </table>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</div>

<script>
   function filterOrderHistory(filter) {
      window.location.href = '{{ route("quan-ly-tk-user") }}?filter=' + filter;
   }
</script>
@endsection
