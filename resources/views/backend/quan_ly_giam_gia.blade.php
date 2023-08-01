@extends('layouts.admin_gas')
@section('sidebar-active-discount', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
    <div class="card mb-3 product-list element_column" data-item="staff">

        <div class="card-header">
            <span class="product-list-name"><a class="text-decoration-none" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-giam-gia')}}">Mã giảm giá</a></span>
        </div>

        <div class="search-option-infor-amdin">

            <div class="add-product-div-admin add-staff-admin">
              <a class="add-staffs" href="{{route('add-discount')}}">Thêm mã mới</a>
            </div>

            <div class="search-infor-amdin-form">
              <form action="{{ route('admin.searchDiscount') }}" method="GET" class="header-with-search-form">
                @csrf
                <i class="search-icon-discount fas fa-search"></i>
                <input type="text" autocapitalize="off" class="header-with-search-input-discount" placeholder="Tìm kiếm" name="search">
                <span class="header_search button" onclick="startRecognition()">
                  <i class="fas fa-microphone" id="microphone-icon"></i> 
                </span>
              </form>
                @if (session('mesage'))
                  <div class="notification-discount">
                    {{ session('mesage') }}
                  </div>
                @endif
            </div>
        </div>
          
        <div class="card-body">
            <div class="table-responsive table-list-product">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th>STT</th>
                    <th class="">Tên mã giảm giá</th>
                    <th class="">Mã giảm giá</th>
                    <th class="">Số lượng mã</th>
                    <th class="">Số phần trăm giảm</th>
                    <th class="">Giảm từ ngày</th>
                    <th class="">Ngày hết hạn giảm</th>
                    <th>Ngày tạo</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach($tbl_discount as $key => $val)
                    <tr class="hover-color">
                      <td class="product-order-quantity">{{$key+1}}</td>
                        <td class="product-order-quantity">{{$val['name_voucher']}}</td>

                        <td class="name-product-td">{{$val['ma_giam']}}</td>

                        <td class="product-order-quantity">{{$val['so_luong']}}</td>

                        <td class="product-order-quantity">{{$val['phan_tram_giam']}}</td>

                        <td class="roduct-order-quantity">{{$val['thoi_gian_giam']}}</td>
                        
                        <td class="roduct-order-quantity">{{$val['thoi_gian_giam']}}</td>


                        <td class="roduct-order-quantity">{{$val['created_at']}}</td>

                        <td class="function-icon">
                          <form action="{{route('edit-discount', $val['id'])}}">
                            <button class="summit-add-product-button" type='submit'>
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                          </form>
                          
                          <form action="">
                            <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal">
                              <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title text-danger" id="exampleModalLabel">Bạn có chắc muốn xóa nhân viên này</h5>
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
