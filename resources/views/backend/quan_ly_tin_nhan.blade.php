@extends('layouts.admin_gas')
@section('sidebar-active-message', 'active' )
@section('content')
<div class="col-10 nav-row-10 ">
    <div class="card mb-3 product-list element_column" data-item="staff">
        <div class="card-header">
          <span class="product-list-name"><a class="text-decoration-none color-name-admin" href="{{route('admin')}}">Admin</a> / <a class="text-decoration-none color-logo-gas" href="{{route('quan-ly-tin-nhan')}}">Quản lý nhắn tin</a></span>
        </div>
        <div class="search-option-infor-amdin mt-3 me-1">
            <div id="notify_comment"></div>
            <div class="search-infor-amdin-form">
              <form action="" method="GET" class="header-with-search-form">
                @csrf
                <i class="search-icon-discount fas fa-search"></i>
                <input type="text" autocapitalize="off" class="header-with-search-input-discount" placeholder="Tìm kiếm" name="search">
                <span class="header_search button" onclick="startRecognition()">
                  <i class="fas fa-microphone" id="microphone-icon"></i> 
                </span>
              </form>
                @if (session('message'))
                  <div class="notification-discount">
                    {{ session('message') }}
                  </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive table-list-product">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
                  <tr class="tr-name-table">
                    <th class="col-6">Nội dung tin nhắn</th>
                    <th class="">Tên người gửi</th>
                    <th class="">Thời gian</th>
                    <th class="">Chức năng</th>
                  </tr>
                </thead>
                
                <tbody class="infor">
                  @foreach($message as $key => $val)
                    <tr class="hover-color">
                      <td class="product-order-quantity">
                        <div class="message-blue ms-3">
                          <div class="message-content pb-4">{{$val['message_content']}}</div>
                          <p class="message-timestamp-left">{{$val['created_at']}}</p>
                        </div>
                        <br>
                        <div class="list-rep-comment mb-2">
                          @foreach($message_rep as $key => $message_reply)
                            @if($message_reply -> message_parent_message == $val->id)
                              <div class="message-orange me-3">
                                <p class="message-content">{{$message_reply->message_content}}</p>
                                <p class=" message-timestamp-right">{{$message_reply->created_at}}</p>
                              </div>
                            @endif
                          @endforeach
                        </div>
                        <div class="d-flex w-100 ms-5">
                          <input class="input-reply-message-admin reply_message_{{$val->id}} mb-1 ps-4" placeholder="Trả lời bình luận"></input>
                          <button class="btn-reply-message" data-id="{{$val->id}}" data-user_id="{{$val->user_id}}">Trả lời</button>
                        </div>
                      </td>
                      <td class="product-order-quantity">{{$val['message_name']}}</td>
                      <td class="product-order-quantity">{{$val['created_at']}}</td>
                      <td class="product-order-quantity">
                        <form action="">
                          <button type="button" class="button-delete-order" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-trash function-icon-delete" aria-hidden="true"></i>
                          </button>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title text-danger" id="exampleModalLabel">Bạn có chắc muốn xóa tin nhắn này</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                                  <button class="summit-add-room-button btn btn-primary" type='submit'>Xóa</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $('.btn-reply-message').click(function(){
        var id = $(this).data('id');
        var message_content = $('.reply_message_'+id).val();
        var user_id = $(this).data('user_id');
        $.ajax({
          url: "{{ route('reply-message') }}",
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            message_content: message_content, 
            id:id,  
            user_id:user_id
          },
          success: function(data) {
            $('.reply_message_'+id).val('');
            location.reload();
          },
          error: function(xhr, status, error) {
          }
        });
      })
    </script>
@endsection
