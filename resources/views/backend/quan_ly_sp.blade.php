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
                  <a class="add-product" href="{{route('add-product-admin')}}">Nhập sản phẩm</a>
                </div>
                <div class=" search-infor-amdin-form-staff">
                  <form action="{{ route('admin.search_product') }}" method="GET" class="header-with-search-form ">
                    @csrf
                    <i class="search-icon-discount fas fa-search"></i>
                    <input type="text" autocapitalize="off" class="header-with-search-input header-with-search-input-discount" placeholder="Tìm kiếm" name="search">
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
                  <tr class="tr-name-table bg-success">
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

                      <td class="name-product-td infor-product">
                        <?php if($val['loai']==1){echo "<span style='color: #ef5f0e; font-weight: 500'>Gas công nghiệp</span>";}
                        else{echo "<span style='color: #09b6a6; font-weight: 500'>Gas dân dụng</span>";} ?>
                      </td>

                      <td class="name-product-td infor-product">{{$val['quantity']}}</td>

                      <td class="name-product-td infor-product">{{number_format($val['price'])}} đ</td>

                      <td class="name-product-td infor-product">{{number_format($val['original_price'])}} đ</td>

                      <td class="function-icon infor-product">
                        <form action="{{route('edit-product', $val['id'])}}">
                          <button class="summit-add-product-button" type='submit'>
                            <i class="fa-solid fa-pen-to-square"></i>
                          </button>
                        </form>
                        
                        <form action="{{route('delete-product', $val['id'])}}">
                          <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal{{$val['id']}}">
                            <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                          </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$val['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <nav aria-label="Page navigation example" class="nav-link-page">
                <ul class="pagination">
                  @for ($i = 1; $i <= $product->lastPage(); $i++)
                    <li class="page-item{{ ($product->currentPage() == $i) ? ' active' : '' }}">
                      <a class="page-link a-link-page" href="{{ $product->url($i) }}">{{ $i }}</a>
                    </li>
                  @endfor
                </ul>
              </nav>
            </div>
            
          </div>
        </div>
        <script>
          function toggleActiveButton() {
            const button = document.querySelector('.accordion-button');
            button.classList.toggle('active-button');
          }
          const links = document.querySelectorAll('.home-filter-buttons a');
          links.forEach(link => {
            link.addEventListener('click', toggleActiveButton);
          });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
        