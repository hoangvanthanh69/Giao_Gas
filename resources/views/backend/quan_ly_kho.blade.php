@extends('layouts.admin_gas')
@section('sidebar-active-product-warehouse', 'active' )
@section('content')

      <div class="col-10 nav-row-10 ">   

        <div class="card mb-3 product-list element_column " data-item="product">
          <div class="card-header">
            <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-kho')}}">Danh sách nhập kho</a></span>
          </div>
          <div class="card-body">
            <div class="table-responsive table-list-product">
              <div class="search-option-infor-amdin">
                <div class="search-infor-amdin-form-staff">
                  <a class="add-product" href="{{route('add-product-warehouse')}}">Nhập kho sản phẩm</a>
                </div>
                <div class=" search-infor-amdin-form-staff">
                  <form action="{{route('search-warehouse')}}" method="GET" class="header-with-search-form ">
                    @csrf
                    <i class="search-icon-discount fas fa-search"></i>
                    <input type="text" autocapitalize="off" class="header-with-search-input header-with-search-input-discount" placeholder="Mã, ID_tên SP, tên NV" name="search">
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
                    <th class="width-stt">STT</th>
                    <th>Mã Nhập</th>
                    <th>ID SP</th>
                    <th>Tên SP</th>
                    <th>SL</th>
                    <th>Giá Nhập</th>
                    <th>Tổng</th>
                    <th>Nhân Viên Nhập</th>
                    <th>Ngày Nhập</th>
                    <th>Chức Năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach ($product_warehouse as $key => $val)
                    <tr class="">
                        <td class="">{{ $key + 1 }}</td>
                        <td class="">{{ $val['batch_code'] }}</td>
                        <td>{{ $val['product_id'] }}</td>
                        <td class="">{{ $productNames[$val['product_id']] }}</td>
                        <td class="">{{ $val['quantity'] }}</td>
                        <td>{{ number_format($val['price']) }} đ</td>
                        <td>{{ number_format($val['total']) }} đ</td>
                        <td class="">{{ $admin_Names[$val['staff_id']] }}</td>
                        <td class="">{{$val['created_at']}}</td>
                        <td class="function-icon ">
                          <form action="">
                            <button class="summit-add-product-button" type='submit'>
                              <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                          </form>
                          
                          <form action="">
                            <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="">
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
                <h1 id="showtext">
              </table>
              @if (!$search)
                <nav aria-label="Page navigation example" class="nav-link-page">
                  <ul class="pagination">
                    @for ($i = 1; $i <= $product_warehouse->lastPage(); $i++)
                      <li class="page-item{{ ($product_warehouse->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link a-link-page" href="{{ $product_warehouse->url($i) }}">{{ $i }}</a>
                      </li>
                    @endfor
                  </ul>
                </nav>
              @endif
            </div>
          </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
        