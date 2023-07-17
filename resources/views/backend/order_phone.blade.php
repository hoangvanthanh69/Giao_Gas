@extends('layouts.admin_gas')
@section('sidebar-active-orders', 'active' )
@section('content')
    <div class="col-10">
        <div>
            <h5 class="text-center">Thêm đơn hàng mới</h5>
        </div>

        <div class="row">
            <div class="col-5 ps-5">
                <form id="signupForm" enctype="multipart/form-data" method='post' action="{{route('add-order')}}">
                    @csrf
                    
                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Số điện thoại:</label>
                        <input class="infor-customer-input col-12" type="text" name="phone" id="phone">
                    </div>

                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Họ và Tên:</label>
                        <input class="infor-customer-input col-12" type="text" name="last_name" id="last_name">
                    </div>

                    <div class=" mt-4">
                        <label class="name-add-product-customer-all" for="">Đỉa chỉ:</label>
                        <div class="d-flex address-customer-form">
                            <input class="col-3 address-customer-input" type="text" name="country" id="country" placeholder="Tỉnh/TP">
                
                            <input class="col-3 address-customer-input" type="text" name="state" id="state" placeholder="Quận/Huyện">

                            <input class="col-3 address-customer-input" type="text" name="district" id="district" placeholder="Phường/Xã">

                            <textarea class="col-3 address-customer-input" type="text" name="diachi" id="diachi" placeholder="địa chỉ"></textarea>
                        </div>
                    </div>



                    <div class="mt-4 ">
                        <label class="name-add-product-customer-all" for="">Loại gas:</label>
                        <div class= "p-0">
                            <select id="type" name="type" class="form-select " aria-label="Default select example">
                                <option value="0">Chọn loại gas</option>
                                <option value="1">Gas Công Nghiệp</option>
                                <option value="2">Gas Dân Dụng</option>
                            </select>    
                        </div>
                            
                    </div>

                    <div class="mt-4 ">
                        <label class="name-add-product-customer-all" for="">Giảm giá:</label>
                        <div class= "p-0">
                            <select id="type" name="type" class="form-select " aria-label="Default select example">
                                <option value="0">Chọn voucher</option>
                            </select>    
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="name-add-product-customer-all" for="">Tổng giá:</label>
                        <input class="infor-customer-input col-12" type="text" name="luong">
                    </div>
                    
                </form>
            </div>

            <div class="col-7">
                hello
            </div>
        </div>
        <div class="text-center">
            <a class="back-product text-center" href="{{route('quan-ly-nv')}}">Trở lại</a>
        </div>
    <script language="javascript">print_country("country");</script>
    <script language="javascript">print_state("state");</script>
    <script language="javascript">print_district("district");</script>

@endsection
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('frontend/js/doigas.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#phone').on('blur', function() {
                var phoneNumber = $(this).val();
                $.ajax({
                    url: "{{ route('check-customer') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        phone: phoneNumber
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#last_name').val(response.customerName);
                            $('#country').val(response.country);
                            $('#state').val(response.state);
                            $('#district').val(response.district);
                            $('#diachi').val(response.diachi);
                        } else {
                            // Nếu không tìm thấy khách hàng, không làm gì cả hoặc hiển thị thông báo nếu bạn muốn
                        }
                    },
                    error: function(xhr, status, error) {
                        
                    }
                });
            });
        });
    </script>
