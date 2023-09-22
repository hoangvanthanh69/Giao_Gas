@extends('layouts.admin_gas')
@section('sidebar-active-product-inventory', 'active' )
@section('content')

    <div class="col-10 nav-row-10 ">   

        <div class="card mb-3 product-list element_column " data-item="product">
          <div class="card-header">
            <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-ton-kho')}}">Danh sách tồn kho</a></span>
          </div>
          <div class="card-body">
            <div class="table-responsive table-list-product">
                <div class="search-option-infor-amdin">
                    <div class=" search-infor-amdin-form-staff">
                        <form action="{{route('search-inventory')}}" method="GET" class="header-with-search-form ">
                          @csrf
                            <i class="search-icon-discount fas fa-search"></i>
                            <input type="text" autocapitalize="off" class="header-with-search-input header-with-search-input-discount" placeholder="Mã, ID_tên SP" name="search">
                            <span class="header_search button" onclick="startRecognition()">
                            <i class="fas fa-microphone" id="microphone-icon"></i> 
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
                    <th>ID SP</th>
                    <th>Tên SP</th>
                    <th>Loại SP</th>
                    <th>SL Trong Kho</th>
                    <th>Giá bán</th>
                    <th>Tổng SL Nhập</th>
                    <th>Tổng Giá Trong Kho</th>
                    <th>Tổng Giá Nhập</th>
                    <th>SL Đã Bán</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                    @foreach($product as $products)
                        <tr>
                            <td class="">{{$products->id}}</td>
                            <td>{{$products->name_product}}</td>
                            <td> 
                                <?php if($products->loai ==1){echo "<span style='color: #ef5f0e; font-weight: 500'>Gas công nghiệp</span>";}
                                else{echo "<span style='color: #09b6a6; font-weight: 500'>Gas dân dụng</span>";} ?>
                            </td>
                            <!-- số lượng trong kho -->
                            <td class="">{{$products->quantity}}</td>

                            <td>{{number_format($products->price)}} đ</td>

                            <!-- Tổng số lượng nhập -->
                            <td>{{$totalQuantity[$products->id] ?? 0}}</td>

                            <!-- Tổng giá trong kho -->
                            <td>{{number_format(($totalQuantity[$products->id] ?? 0) * $products->price)}} đ</td>

                            <!-- Tổng giá nhập -->
                            <td>{{number_format($totalPrice[$products->id] ?? 0)}} đ</td>

                            <!-- số lượng đã bán -->
                            <td>{{$quantity_sold[$products->id] ?? 0}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <h1 id="showtext">
              </table>
              
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
        