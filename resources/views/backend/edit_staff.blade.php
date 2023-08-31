@extends('layouts.admin_gas')
@section('sidebar-active-customer', 'active' )
@section('content')

        <div class="col-10 nav-row-10 ">
            <div class="mb-4 product-list-staff-add">
                <span class="product-list-name fs-5">
                    <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-nv')}}">Danh sách nhân viên</a> / <a class="text-decoration-none" href="{{route('add-staff')}}">Thêm nhân viên mới</a>
                </span>
            </div>
            <div class="add-staff-form">
                <div class="add-staff-heading-div">
                    <span>Tạo mới nhân viên</span>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('update-staff',$staff->id)}}">
                    @csrf
                    <div class="col-4">
                        <span class="name-add-product-all col-4" for="">Thêm ảnh</span>
                        <div>
                            <input  class="input-add-product name-add-product-all-img col-8 mt-2" type="file" name="image_staff" >
                            <img class="col-4 ms-3 image-admin-product-edit" src="{{asset('uploads/staff/'.$staff['image_staff']) }}" alt="" style="width: 130px">
                        </div>
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Họ và Tên</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="last_name" value="{{$staff->last_name}}">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Năm sinh</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="date" name="birth" value="{{$staff->birth}}">
                    </div>

                    <div class="col-4 mt-4 ">
                        <span class="name-add-product-all" for="">Chức vụ</span>
                        <div class='mt-2 p-0'>
                            <select id="chuc_vu" name="chuc_vu"  class="input-add-product col-11 ps-2 pe-2" aria-label="Default select example">
                                <option value="">Chọn Chức vụ</option>
                                <option value="1" <?php echo  $staff['chuc_vu']==1?'selected':'' ?>>Giao hàng</option>
                                <option value="2" <?php echo  $staff['chuc_vu']==2?'selected':'' ?>>Quản lý</option>
                                <option value="3" <?php echo  $staff['chuc_vu']==3?'selected':'' ?>>Biên tập</option>
                            </select>    
                        </div>
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Tài khoản @</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="taikhoan" value="{{$staff->taikhoan}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Địa chỉ thường trú</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="dia_chi" value="{{$staff->dia_chi}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">CCCD</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="CCCD" value="{{$staff->CCCD}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Giới tính</span>
                        <select id="gioi_tinh" name="gioi_tinh"  class="input-add-product col-11 ps-2 pe-2" aria-label="Default select example">
                            <option value="">Chọn giới tính</option>
                            <option value="1" <?php echo  $staff['gioi_tinh']==1?'selected':'' ?>>Nam</option>
                            <option value="2" <?php echo  $staff['gioi_tinh']==2?'selected':'' ?>>Nữ</option>
                        </select> 
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Ngày vào làm</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="date" name="date_input" value="{{$staff->date_input}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all" for="">Số điện thoại</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="phone" value="{{$staff->phone}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all" for="">Lương/tháng</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="luong" value="{{$staff->luong}}">
                    </div>
                    <div class="text-center mt-4">
                        <a class="back-product" href="{{route('quan-ly-nv')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>
                </form>
            </div>
@endsection

        </div>

    </div>
</div>
