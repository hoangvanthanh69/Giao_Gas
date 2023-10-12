@extends('layouts.admin_gas')
@section('sidebar-active-permissions', 'active' )
@section('content')

        <div class="col-10 nav-row-10 ">   
            <div class="mb-4 product-list-staff-add">
                <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-phan-quyen')}}">Danh sách phân quyền /</a>
                <a class="text-decoration-none color-name-admin-add" href="">Gán quyền cho quản trị viên</a>
                </span>
            </div>
            
            <div class="add-staff-form">
                <div class="search-infor-amdin-form-staff mt-3">
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
                    <span>Cập nhật quyền cho nhân viên</span>
                </div>
                <form enctype="multipart/form-data" method="post" action="{{ route('update-role-permissions', $role_permissions->id) }}">
                    @csrf
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Nhân viên:
                            <span name="id_admin">{{ $admin_name }}</span>
                        </span>
                    </div>
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Thiết lập quyền
                            <span class="color-required fw-bolder">*</span>
                        </span>
                        @foreach($tbl_permissions as $permission)
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->permission_id }}" @if(in_array($permission->permission_id, $selectedPermissions)) checked @endif>
                                {{ $permission->permission_name }}
                            </label>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <a class="back-product" href="{{ route('quan-ly-phan-quyen') }}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
@endsection
        