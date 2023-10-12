@extends('layouts.admin_gas')
@section('sidebar-active-permissions', 'active' )
@section('content')

        <div class="col-10 nav-row-10 ">   
            <div class="mb-4 product-list-staff-add">
                <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-phan-quyen')}}">Danh sách phân quyền /</a>
                <a class="text-decoration-none color-name-admin-add" href="{{route('add-role-permission')}}">Gán quyền cho quản trị viên</a>
                </span>
            </div>
            <div class="add-staff-form">
                <div class="search-infor-amdin-form-staff mt-3 mb-3 ms-2">
                  <a class="add-product" href="{{route('add-permissions')}}">Thêm quyền</a>
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
                <div class="add-staff-heading-div">
                    <span>Tạo mới nhân viên</span>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('role-permissions')}}">
                    @csrf
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Nhân viên
                            <span class="color-required fw-bolder">*</span>
                        </span>
                        <select name="admin_id" class="form-select-delivery mt-2">
                            <option value="">--- Chọn ---</option>
                                @foreach($tbl_admin as $admin)
                                    <option value="{{$admin->id}}">{{$admin-> id}} - {{$admin-> admin_name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Thiết lập quyền
                            <span class="color-required fw-bolder">*</span>
                        </span>
                        @foreach($tbl_permissions as $permissions)
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permissions->permission_id }}">
                                {{ $permissions->permission_name }}
                            </label>
                        @endforeach

                    </div>

                    <div class="text-center mt-4">
                        <a class="back-product" href="{{route('quan-ly-phan-quyen')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
@endsection
        