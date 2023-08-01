@extends('layouts.admin_gas')
@section('sidebar-active-discount', 'active' )
@section('content')
        <div class="col-10 nav-row-10 ">
            <div class="mb-4 product-list-staff-add">
                <span class="product-list-name fs-5">
                    <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-giam-gia')}}">Danh sách mã giảm</a> / <a class="text-decoration-none" href="{{route('add-discounts')}}">Thêm mã mới</a>
                </span>
            </div>
            <div class="add-staff-form">
                <div class="add-staff-heading-div">
                    <span>Cập nhật mã</span>
                </div>
                <form class="row container" id="signupForm" enctype="multipart/form-data" method='post' action="{{route('update-discounts', $tbl_discount -> id)}}">
                    @csrf
                    
                    <div class="col-4">
                        <span class="name-add-product-all" for="">Tên mã</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="name_voucher" value="{{$tbl_discount -> name_voucher}}">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all" for="">Mã giảm</span>
                        <input class="input-add-product ps-2 col-11 mt-2 ps-2 pe-2" type="text" name="ma_giam" value="{{$tbl_discount -> ma_giam}}">
                    </div>

                    <div class="col-4">
                        <span class="name-add-product-all " for="">Số lượng</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="so_luong" value="{{$tbl_discount -> so_luong}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Phần trăm giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2" type="text" name="phan_tram_giam" value="{{$tbl_discount -> phan_tram_giam}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Giảm từ ngày</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="thoi_gian_giam" value="{{$tbl_discount -> thoi_gian_giam}}">
                    </div>

                    <div class="col-4 mt-4">
                        <span class="name-add-product-all " for="">Ngày hết hạn giảm</span>
                        <input class="input-add-product col-11 mt-2 ps-2 pe-2" type="datetime-local" name="het_han" value="{{$tbl_discount -> het_han}}">
                    </div>

                    <div class="text-center mt-4">
                        <a class="back-product" href="{{route('quan-ly-giam-gia')}}">Trở lại</a>
                        <button class="add-product button-add-product-save" type="submit">Lưu</button>
                    </div>

                </form>

                
            </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </div>

    </div>
</div>
