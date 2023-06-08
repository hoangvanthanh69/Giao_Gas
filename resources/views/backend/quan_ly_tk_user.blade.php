@extends('layouts.admin_gas')
@section('sidebar-active-tk-user', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
<div class="card mb-3 product-list element_column" data-item="staff">
   <div class="card-body">
      <div class="table-responsive table-list-product">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <h5 class="list-account-admin">Tài khoản khách hàng</h5>
                <tr class="tr-name-table bg-success">
                     <th>STT</th>
                     <th>Họ tên</th>
                     <th>Email</th>
                     <th>Mật khẩu</th>
                     <th>Số đơn hàng</th>
                     <th>Chức năng</th>
                </tr>
            </thead>
            <tbody class="infor">
               @foreach($users as $key => $val)
               <tr class="hover-color">
                  <td>{{$key+1}}</td>
                  <td class="product-order-quantity">{{$val['name']}}</td>
                  <td class="product-order-quantity">{{$val['email']}}</td>
                  <td class="product-order-quantity">
                     {{str_repeat('*', strlen($val['password']))}}
                     <!-- {{$val['password']}} -->
                  </td>
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
