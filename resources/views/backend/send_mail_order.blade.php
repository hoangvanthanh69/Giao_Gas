<div style="width:680px; margin: 0 auto">
    <div style="text-align: center;height: 63px; line-height: 60px; background-color: #77d020; border-radius: 2px; font-size: 16px; color: white;">
        <h4 >Gas Tech xin chân thành cảm ơn bạn đã đặt hàng</h4>
    </div>

    <div style="">
        <p style="font-size: 15px;">Xin chào {{$user->name}}</p>
    </div>

    <div style="">
        <p style="color: #ffcf00; font-size: 17px;">Địa chỉ nhận hàng:</p>
        <p style="color: #198754; font-size: 15px;">{{$order->nameCustomer}}</p>
        <p style="color: #198754; font-size: 15px;">(+84) {{$order->phoneCustomer}}</p>
        <p style="color: #312e2e; font-weight: 500; font-size: 15px;">{{$order->diachi}}, Phường {{$order->district}}, Quận {{$order->state}}, Thành Phố {{$order->country}}</p>
    </div>

    <div style="display: flex; font-size: 15px;">
        <div style="flex: 0 0 auto; width: 45%;">
            <strong style="padding-bottom: 1.5rem; padding-right: 0.25rem">Mã đơn hàng: </strong>
            <span style="background-color: #ffc107; height: 27px !important; ">{{$order->order_code}}</span>
        </div>
        <div style="padding-left: 1rem; flex: 0 0 auto; width: 30%;">
            Loại: {{$order->loai == 1 ? 'Gas công nghiệp' : 'Gas dân dụng'}}
        </div>
    </div>


    <div style="display: flex; ">
        <div style="flex: 0 0 auto; width: 60%; font-size: 15px;">
            <p style="font-size: 15px;">Thông tin sản phẩm:</p>
            @foreach(json_decode($order->infor_gas) as $product)
                <div style="display: flex; margin-right: 10px;">
                    <div style="align-items: center; line-height: 50px; padding-right: 10px;">
                        {{$product->product_name}}
                    </div>

                    <div style="flex: 0 0 auto; align-items: center; line-height: 50px; padding-right: 10px;">
                        Số lượng: {{$product->quantity}}
                    </div>

                    <div style="flex: 0 0 auto; align-items: center; line-height: 50px;">
                        {{number_format($product->product_price)}} VNĐ
                    </div>
                </div>
            @endforeach
        </div>

        <div style="flex: 0 0 auto; width: 40%; font-size: 15px;">
            <p style="font-size: 15px;">Tổng Cộng:</p>
            <div style="display: flex">
                <div style="flex: 0 0 auto; width: 60%; line-height: 50px;">
                    Tổng tiền sản phẩm:
                </div>

                <div style="flex: 0 0 auto;width: 40%; line-height: 50px;">
                    {{number_format($order->tong)}} VNĐ
                </div>
            </div>

            <div style="display: flex; border-bottom: 1px solid #dee2e6">
                <div style="flex: 0 0 auto; width: 60%; line-height: 50px;">
                    Khuyến mái giảm giá:
                </div>
                
                <div style="flex: 0 0 auto;width: 40%; line-height: 50px;">
                    0 VNĐ
                </div>
            </div>

            <div style="display: flex">
                <div style="flex: 0 0 auto; width: 60%; line-height: 50px;">
                    Thành tiền:
                </div>

                <div style="flex: 0 0 auto; width: 40%; line-height: 50px; color: red;">
                    {{number_format($order->tong)}} VNĐ
                </div>
            </div>
        </div>

    </div>

    <div style="font-size: 15px;">
        Ghi chú: {{$order->ghichu}}
    </div>

    <div style="text-align: center; font-size: 15px;">
        Mọi thắc mắc xin liên hệ: <a href="">0837641469</a>
    </div>

</div>
