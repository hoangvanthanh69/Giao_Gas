@extends('layouts.admin_gas')
@section('sidebar-active-product', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">   

        <div class="card mb-3 product-list element_column " data-item="product">
          <div class="card-header">
            <span class="product-list-name btnbtn">Admin / Sản Phẩm</span>
          </div>
          <div class="card-body">
            
            <div class="table-responsive table-list-product">
              <div class="search-option-infor-amdin">
                <div class="search-infor-amdin-form-staff">
                  <a class="add-product" href="{{route('add-product-admin')}}">Thêm sản phẩm</a>
                </div>
                <div class=" search-infor-amdin-form-staff">
                  <form action="{{ route('admin.searchOrder_product') }}" method="GET" class="header-with-search-form ">
                    @csrf
                    <input type="text" autocapitalize="off" class="header-with-search-input" placeholder="Tìm kiếm" name="search">
                    <span class="header_search button">
                      <i class="header-with-search-icon fas fa-search"></i>
                    </span>
                  </form>
                </div>
              </div>
              
                @if (session('success'))
                    <div class="notification">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('mesages'))
                <div class="notification-search">
                  {{ session('mesages') }}
                </div>
              @endif
              
              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Loại gas</th>
                    <th>Số lượng</th>
                    <th>Giá ban đầu</th>
                    <th>Giá bán</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach($product as $key => $val)

                    <tr class="hover-color">
                      <td class="name-product-td infor-product">{{$val['name_product']}}</td>
                      <td class="img-product-td">
                        <img class="image-admin-product-edit"  src="{{asset('uploads/product/'.$val['image'])}}" width="100px"  alt="">
                        
                      </td>
                      <td class="name-product-td infor-product"><?php if($val['loai']==1){echo 'Gas công nghiệp';}else{echo 'Gas dân dụng';}  ?></td>
                      <td class="name-product-td infor-product">{{$val['quantity']}}</td>
                      <td class="name-product-td infor-product">{{number_format($val['price'])}} đ</td>
                      <td class="name-product-td infor-product">{{number_format($val['original_price'])}} đ</td>
                      
                      
                      <td class="function-icon">
                        <form action="{{route('edit-product', $val['id'])}}">
                          <button class="summit-add-product-button infor-product" type='submit'>
                            <i class="fa fa-wrench icon-wrench" aria-hidden="true"></i>
                          </button>
                        </form>
                        
                        <form action="{{route('delete-product', $val['id'])}}">
                          <button class="summit-add-product-button infor-product" type='submit'>
                            <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    

                  @endforeach 
                  

                  
                </tbody>
                <h1 id="showtext">

              </table>
            </div>
          </div>
        </div>

@endsection
        