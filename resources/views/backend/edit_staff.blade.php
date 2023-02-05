@extends('layouts.admin_gas')

@section('content')


        <div class="col-10 nav-row-10 ">
            <div class="add-product-each w-50 ">
                <form enctype="multipart/form-data" method='post' action="{{route('update-staff',$staff->id)}}">
                    @csrf
                    <div class="row">
                        <label class="name-add-product-all col-4" for="">Họ và Tên:</label>
                        <input class="input-add-product col-8" type="text" name="last_name" value="{{$staff->last_name}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Năm sinh:</label>
                        <input class="input-add-product col-8" type="date" name="birth" value="{{$staff->birth}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Chức vụ:</label>
                        <div class='col-8 p-0'>
                            <select id="chuc_vu" name="chuc_vu"  class="form-select " aria-label="Default select example">
                                <option value="">Chọn Chức vụ</option>
                                <option value="1" <?php echo  $staff['chuc_vu']==1?'selected':'' ?>>Nhân viên</option>
                                <option value="2" <?php echo  $staff['chuc_vu']==2?'selected':'' ?>>Quản lý</option>
                            </select>    

                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Tài khoản@:</label>
                        <input class="input-add-product col-8" type="text" name="taikhoan" value="{{$staff->taikhoan}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Địa chỉ:</label>
                        <input class="input-add-product col-8" type="text" name="dia_chi" value="{{$staff->dia_chi}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Mã số:</label>
                        <input class="input-add-product col-8" type="text" name="code_staff" value="{{$staff->code_staff}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Ngày vào làm:</label>
                        <input class="input-add-product col-8" type="date" name="date_input" value="{{$staff->date_input}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Số điện thoại:</label>
                        <input class="input-add-product col-8" type="text" name="phone" value="{{$staff->phone}}">
                    </div>

                    <div class="row mt-4">
                        <label class="name-add-product-all col-4" for="">Lương/tháng:</label>
                        <input class="input-add-product col-8" type="text" name="luong" value="{{$staff->luong}}">
                    </div>
                    
                    <div class="back-add-product">
                        <a class="back-product" href="{{route('admin')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Cập nhật nhân viên</button>
                    </div>
                    
                    
                </form>
            </div>
@endsection

        </div>

      
    </div>
</div>