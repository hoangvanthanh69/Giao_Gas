@extends('layouts.admin_gas')
@section('sidebar-active-permissions', 'active' )
@section('content')

    <div class="col-10 nav-row-10 ">   

        <div class="card mb-3 product-list element_column " data-item="product">
            <div class="card-header">
                <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-phan-quyen')}}">Danh sách phân quyền</a></span>
            </div>
            <div class="card-body">
                <div class="search-infor-amdin-form-staff mt-3">
                  <a class="add-product" href="{{route('add-permissions')}}">Thêm quyền</a>
                </div>

                <div class="search-infor-amdin-form-staff mt-3">
                  <a class="add-product" href="{{route('add-role-permission')}}">Gán quyền cho admin</a>
                </div>
                @if (session('success'))
                    <div class="change-password-customer-home d-flex">
                    <i class="far fa-check-circle icon-check-success"></i>
                    {{ session('success') }}
                    </div>
                @endif
                @if (session('message'))
                    <div class="success-customer-home-notification d-flex">
                    <i class="fas fa-ban icon-check-cancel"></i>
                    {{ session('message') }}
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="tr-name-table">
                            <th class="width-stt">STT</th>
                            <th>Tên Nhân Viên</th>
                            <th>Thiết lập quyền</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody class="infor">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($admin_Names as $admin_id => $admin_name)
                            <tr class="hover-color">
                                <td>{{$count++}}</td>
                                <td>ID: {{$admin_id}} - {{$admin_name }} </td>
                                <td>
                                    @foreach ($permissionsNames[$admin_id] as $permission)
                                        <span class="ms-2">{{ $permission }}</span>
                                    @endforeach
                                </td>
                                <td class="function-icon">
                                    <form action="{{ route('edit-role-permissions', ['id_admin' => $admin_id]) }}">
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
                </table>
            </div>
        </div>
@endsection
        