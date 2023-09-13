<?php

namespace App\Exports;

use App\Models\order_product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelExports implements FromCollection, WithHeadings
{
    // protected $filters;

    public function __construct($status, $loai){
        $this->status = $status;
        $this->loai = $loai;
    }

    public function collection(){
        $query = order_product::query();
        if ($this->status != 'all') {
            $query->where('status', $this->status);
        }

        if ($this->loai != 'all') {
            $query->where('loai', $this->loai);
        }
        // dd($this->status, $this->loai);
        return $query->get();
    }

    public function headings(): array{
        return [
            'ID',
            'Tên khách hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Tỉnh / Tp',
            'Quận / Huyện',
            'Phường / Xã',
            'Ghi chú',
            'Loại',
            'Tổng',
            'Trạng thái giao hàng',
            'user_id',
            'Tên nhân viên giao hàng',
            'Mã đơn hàng',
            'Ngày tạo',
            'Thông tin sản phẩm',
            'Giá trị giảm giá',
            'Mã giảm giá',
            'Trạng thái thanh toán',
        ];
    }
}
