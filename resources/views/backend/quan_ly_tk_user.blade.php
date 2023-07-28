@extends('layouts.admin_gas')
@section('sidebar-active-tk-user', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
<div class="d-flex mb-3">
   <div class="card-body col-6">
      <div class="table-responsive ">
      <h5 class="list-account-admin text-center text-success">khách hàng đặt trên hệ thống</h5> 
         <table class="table table-bordered bg-table-white" id="dataTable" width="100%" cellspacing="0">
            <thead class="">
               <tr class="tr-name-table bg-success">
                  <th class="line-height-acount-user">STT</th>
                  <th class="col-3 line-height-acount-user">Họ tên</th>
                  <th class="line-height-acount-user">SĐT</th>
                  <th>Số đơn hàng</th>
                  <th>Chức năng</th>
               </tr>
            </thead>
            <tbody class="infor table-list-product">
               @foreach($users as $key => $val)
               <tr class="">
                  <td>{{$key+1}}</td>
                  <td class="product-order-quantity">{{$val['name']}}</td>
                  <td class="product-order-quantity">{{$val['email']}}</td>
                  
                  <td class="product-order-quantity">{{$val['order_count']}}</td>
                  <td class="product-order-quantity">
                     <form action="{{route('delete_account_users', $val['id'])}}">
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

   <div class="card-body col-6">
      <div class="table-responsive ">
      <h5 class="list-account-admin text-center">khách hàng đặt qua số điện thoại</h5> 
         <table class="table table-bordered bg-table-white" id="dataTable" width="100%" cellspacing="0">
            <thead class="">
               <tr class="tr-name-table ">
                  <th class="line-height-acount-user">STT</th>
                  <th class="col-3 line-height-acount-user">Họ tên</th>
                  <th class="line-height-acount-user">SĐT</th>
                  <th>Số đơn hàng</th>
                  <th>Chức năng</th>
               </tr>
            </thead>
            <tbody class="infor table-list-product">
               @foreach($users as $key => $val)
               <tr class="">
                  <td>{{$key+1}}</td>
                  <td class="product-order-quantity">{{$val['name']}}</td>
                  <td class="product-order-quantity">{{$val['email']}}</td>
                  
                  <td class="product-order-quantity">{{$val['order_count']}}</td>
                  <td class="product-order-quantity">
                     <form action="{{route('delete_account_users', $val['id'])}}">
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
