@extends('layouts.admin_gas')
@section('sidebar-active-tai-khoan', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
<div class="card mb-3 product-list element_column" data-item="staff">
   <div class="card-body">
      <div class="table-responsive table-list-product">
         <div class="add-account-admin-a float-end">
            <a href="{{route('add_account_admin')}}" class="add-account-admin">Thêm tài khoản quản trị</a>
         </div>
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <h5 class="list-account-admin">Tài khoản quản trị đã duyệt</h5>
               <tr class="tr-name-table">
                  <th>STT</th>
                  <th>Ảnh</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Chức vụ</th>
                  <th>Số đơn</th>
                  <th>Chức năng</th>
               </tr>
            </thead>
            <tbody class="infor">
               @foreach($tbl_admin as $key => $val)
               <tr class="hover-color">
                  <td>{{$key+1}}</td>
                  <td class="img-product-td">
                     <img class="image-admin-product-edit"  src="{{asset('uploads/staff/'.$val['image_staff'])}}" width="100px"  alt="">
                  </td>
                  <td class="product-order-quantity">{{$val['admin_name']}}</td>
                  <td class="product-order-quantity">{{$val['admin_email']}}</td>
                  <td class="product-order-quantity">{{$val['admin_password']}}</td>
                  <td class="product-order-quantity"><?php 
                     if($val['chuc_vu']==1){echo "<span style='color: #d0c801; font-weight: 500'>Giao hàng</span>";} 
                     elseif($val['chuc_vu']==3){echo "<span style='color: #1bd64b; font-weight: 500'>Biên tập</span>";} 
                     else{echo "<span style='color: #e7055c; font-weight: 500'>Quản lý</span>";}  ?>
                  </td>
                  <td class="product-order-quantity">{{$val['order_count']}}</td>
                  <td class="product-order-quantity function-icon icon-line-height">
                     <form action="{{route('edit-account-admin', $val['id'])}}">
                        <button class="summit-add-product-button" type='submit'>
                           <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                     </form>

                     <form action="{{route('delete_account', $val['id'])}}">
                        <button class="button-delete-order" type='submit'>
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
