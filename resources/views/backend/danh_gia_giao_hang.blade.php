@extends('layouts.admin_gas')
@section('sidebar-active-danh-gia-giao-hang', 'active' )
@section('content')

<div class="col-10 nav-row-10 ">
<div class="card mb-3 product-list element_column" data-item="staff">
   <div class="card-body">
      <div class="table-responsive table-list-product">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <h5 class="list-account-admin text-success">Số điểm đánh giá của nhân viên</h5>
                    <tr class="tr-name-table bg-secondary">
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Name</th>
                        <th>Chức vụ</th>
                        <th>Đánh giá</th>
                    </tr>
                </thead>
                <tbody class="infor">
                @php
                    $count = 1;
                @endphp
                    @foreach($tbl_admin as $key => $val)
                    @if($val['chuc_vu']!=2)
                        <tr class="hover-color">
                            <td>{{$count++}}</td>
                            <td class="img-product-td">
                                <img class="image-admin-product-edit"  src="{{asset('uploads/staff/'.$val['image_staff'])}}" width="100px"  alt="">
                            </td>
                            <td class="product-order-quantity">{{$val['admin_name']}}</td>
                            <td class="product-order-quantity"><?php 
                                if($val['chuc_vu']==1){echo "<span style='color: #d0c801; font-weight: 500'>Giao hàng</span>";} 
                                elseif($val['chuc_vu']==3){echo "<span style='color: #1bd64b; font-weight: 500'>Biên tập</span>";} 
                                else{echo "<span style='color: #e7055c; font-weight: 500'>Quản lý</span>";}  ?>
                            </td>
                            <td>
                                {{ $val['ratings'] }} sao
                                <div class="star-ratings">
                                    <?php 
                                        for ($i = 1; $i <= 5; $i++) { 
                                            $star_color = '';
                                            if ($i <= $val['ratings']) {
                                                $star_color = 'checked';
                                            } elseif ($i - $val['ratings'] < 0.5) {
                                                $star_color = 'half-checked';
                                        }
                                    ?>
                                    <i class="fa fa-star <?php echo $star_color; ?>"></i>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                    @endif
                    @endforeach 
                </tbody>
            </table>
      </div>
   </div>
</div>

@endsection
