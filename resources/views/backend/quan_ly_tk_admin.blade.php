@extends('layouts.admin_gas')
@section('sidebar-active-tai-khoan', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">

        <div class="card mb-3 product-list element_column" data-item="staff">

          

          
          <div class="card-body">
            <div class="table-responsive table-list-product">

              
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="tr-name-table">
            <th class="align-center">Mã số</th>
            <th>Email</th>
            <th>password</th>
            <th>name</th>
            <th>Giao hàng</th>
          </tr>
        </thead>
        
        <tbody class="infor">
          @foreach($tbl_admin as $key => $val)
            <tr class="hover-color">
                <td class="name-product-td">{{$val['admin_id']}}</td>

                <td class="product-order-quantity">{{$val['admin_email']}}</td>

                <td class="product-order-quantity">{{$val['admin_password']}}</td>

                <td class="product-order-quantity">{{$val['admin_name']}}</td>

                <td class="product-order-quantity">{{$val['product_id']}}</td>


            </tr>
          @endforeach 
        </tbody>
      </table>
            </div>
          </div>
        </div>

@endsection
