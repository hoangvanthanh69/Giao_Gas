<?php

namespace App\Exports;

use App\Models\order_product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        return order_product::all();
    }
}
