@extends('layouts.admin_gas')

@section('content')

      <div class="col-10 nav-row-10 ">
        <div class="add-product-each w-50 ">
            <form enctype="multipart/form-data" method='post' action="{{route('update-product',$product->id)}}">
            <!-- @method('PATCH') -->
            @csrf
            
              <div class="row ">
                <label class="name-add-product-all col-3" for="">Tên sản phẩm:</label>
                <input class="input-add-product col-9" type="text" name="name_product" value="{{ $product->name_product }}">
              </div>
                
                <br>
                <div class="delivery-location form-product-specials product-type row">
                    <label class="name-add-product-all col-3" for="loai" class="form-label">Loại bình gas:</label>
                    <div class='col-9 p-0'>
                      <select id="loai" name="loai"  class="form-select " aria-label="Default select example">
                          <option value="">Chọn loại gas</option>
                          <option value="1" <?php echo  $product['loai']==1?'selected':'' ?>>Gas công nghiệp</option>
                          <option value="2" <?php echo  $product['loai']==2?'selected':'' ?>>Gas dân dụng</option>
                        </select>    

                    </div>
                </div>

                <div class="row mt-4 img-row-product">
                  <div class="col-3">
                    <label class="name-add-product-all" for="">Thêm ảnh:</label>
                  </div>

                  <div class="col-6">
                    <input  class="input-add-product name-add-product-all-img input-add-product-edit" type="file" name="image" >
                  </div>
                  
                  <div class="col-3">
                    <img class="image-admin-product-edit" src="{{asset('uploads/product/'.$product['image']) }}" alt="" style="width: 130px">
                  </div>
                  
                </div>

                <div class="row mt-4">
                  <label class="name-add-product-all col-3" for="">Giá ban đầu:</label>
                  <input class="input-add-product col-9" type="text" name="price" value="{{ $product->price}}">
                </div>

                <div class="row mt-4">
                  <label class="name-add-product-all col-3" for="">Giá bán:</label>
                  <input class="input-add-product col-9" type="text" name="original_price" value="{{ $product->original_price}}">
                </div>

                <div class="row mt-4">
                  <label class="name-add-product-all col-3" for="">Số lượng:</label>
                  <input class="input-add-product col-9" type="text" name="quantity" value="{{ $product->quantity}}">
                </div>
                
                <div class="back-add-product">
                    <a class="back-product" href="{{route('quan-ly-sp')}}">Trở lại</a>
                  <button class="add-product button-add-product-save" name="update-category-product" type="submit">Cập nhật sản phẩm</button>
                </div>
                
              
            </form>
        </div>
@endsection

      </div>

    </div>

    
  </div>

