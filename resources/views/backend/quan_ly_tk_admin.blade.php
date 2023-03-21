@extends('layouts.admin_gas')
@section('sidebar-active-tai-khoan', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
<div class="card mb-3 product-list element_column" data-item="staff">
   <div class="card-body">
      <div class="table-responsive table-list-product">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <h5 class="list-account-admin">Tài khoản admin đã duyệt</h5>
               <tr class="tr-name-table">
                  <th>STT</th>
                  <th class="">Email</th>
                  <th class="">Password</th>
                  <th class="">Name</th>
                  <th class="">Chức năng</th>
               </tr>
            </thead>
            <tbody class="infor">
               @foreach($tbl_admin as $key => $val)
               <tr class="hover-color">
                  <td>{{$key+1}}</td>
                  <td class="product-order-quantity">{{$val['admin_email']}}</td>
                  <td class="product-order-quantity">{{$val['admin_password']}}</td>
                  <td class="product-order-quantity">{{$val['admin_name']}}</td>
                  <td class="product-order-quantity">
                     <form action="{{route('delete_account', $val['id'])}}">
                        <button class="summit-add-product-button" type='submit'>
                        <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                        </button>
                     </form>
                  </td>
               </tr>
               @endforeach 
            </tbody>
         </table>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <h5 class="list-account-admin">Danh sách tài khoản nhân viên</h5>
               <tr class="tr-name-table-list">
                  <th>STT</th>
                  <th class="">Name</th>
                  <th class="">Email</th>
                  <th>Password</th>
                  <th>Chức năng</th>
               </tr>
            </thead>
            <tbody class="infor">
               @foreach($staff as $key => $val)
               <tr class="hover-color">
                  <td>{{$key+1}}</td>
                  <td class="name-product-td">{{$val['last_name']}}</td>
                  <td class="product-order-quantity">{{$val['taikhoan']}}</td>
                  <form id="signupForm" action="{{route('add_account', $val['id'])}}" method="POST">
                     @csrf
                     <td>
                        @if($val['status_add'])
                          
                        @else
                        <input class="input-password-admin" type="text" name="password" placeholder="Nhập mật khẩu" required autofocus>
                        @endif

                     </td>
                     <td>
                        @if($val['status_add'])
                          <span class="status-add-admin">Đã thêm</span>
                        @else
                          <button class="summit-add-product-button status-add-button" type='submit'>
                            Thêm tài khoản
                          </button>
                        @endif
                     </td>
                  </form>
               </tr>
               @endforeach 
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection
