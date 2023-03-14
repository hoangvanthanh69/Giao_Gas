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
            <th class="align-center">Mã</th>
            <th class="align-center">Email</th>
            <th class="align-center">Password</th>
            <th class="align-center">Name</th>
            <th class="align-center">Chức năng</th>
          </tr>
        </thead>
        
        <tbody class="infor">
          @foreach($tbl_admin as $key => $val)
            <tr class="hover-color">
                <td class="name-product-td infor-product">{{$val['id']}}</td>

                <td class="product-order-quantity infor-product">{{$val['admin_email']}}</td>

                <td class="product-order-quantity infor-product">{{$val['admin_password']}}</td>

                <td class="product-order-quantity infor-product">{{$val['admin_name']}}</td>

                <td class="product-order-quantity infor-product">
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
            </div>
          </div>
        </div>

@endsection
