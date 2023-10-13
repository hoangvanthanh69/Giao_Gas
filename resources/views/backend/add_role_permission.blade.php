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
                    <div class="search-infor-amdin-form-staff mt-3 mb-3 ms-2">
                        <a class="add-product" href="{{route('add-permissions')}}">Thêm quyền</a>
                    </div>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('role-permissions')}}">
                    @csrf
                    <div class="col-4 pe-4 select-staff-role-permission">
                        <div class="name-add-product-all text-center mb-2 fw-bolder">Nhân viên
                            <span class="color-required fw-bolder">*</span>
                        </div>
                        <select name="admin_id" class="form-select-delivery mt-2">
                            <option value="">--- Chọn ---</option>
                                @foreach($tbl_admin as $admin)
                                    <option value="{{$admin->id}}">{{$admin-> id}} - {{$admin-> admin_name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="col-8 ps-4">
                        <div class="name-add-product-all text-center mb-2 fw-bolder">Thiết lập quyền
                            <span class="color-required fw-bolder">*</span>
                        </div>
                        <div class="mt-2 add-role-permession">
                            @foreach ($permissionsByRightsGroup as $rightsGroupName => $permissions)
                                <label class="right-group-name">{{ $rightsGroupName }}</label>
                                <div class="d-flex justify-content-around">
                                    @foreach ($permissions as $permission)
                                        <div class="">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->permission_id }}">
                                            {{ $permission->permission_name }}
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 mt-4">
                        <a class="back-product" href="{{route('quan-ly-phan-quyen')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('frontend/js/jquery.validate.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	$("#signupForm").validate({
            rules: {
                admin_id: "required",      
            },
            messages: {
                admin_id: "Chọn nhân viên",
            },
            errorElement: "div",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback-staff");
                if (element.prop("type") === "checkbox"){
                    error.insertAfter(element.siblings("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            } 
        });
    });
</script>