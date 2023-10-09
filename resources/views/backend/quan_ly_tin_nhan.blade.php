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
      <div class="p-4">
        <div class="card">
          @foreach ($conversations as $userId => $conversation)
          <div class="row g-0 ps-5 pe-5 pt-3 pb-3">
            <button class="toggle-messages-button" data-user_id="{{$userId}}">
              @if ($conversation['user'] -> img)
                <img class="me-2" src="{{ asset('uploads/users/' .  $conversation['user']->img) }}" alt="" width="52px">
              @else
                <img class="me-2" src="{{ asset('frontend/img/logo-login.png') }}" alt="..." width="52px">
              @endif
              <span>ID: {{$userId}}</span>
              <span>{{$conversation['user']->name }}</span>
            </button>
            <div class="position-relative messages-container" style="display:;">
              <div class="chat-messages p-4">
                @foreach($conversation['messages'] as $message)
                  <div class="message-reply-admin">
                    <div class="message-blue ms-3 col-6" data-comment_id="{{$message->id}}" data-user_id="{{$message->user_id}}">
                      <div class="message-content pb-4">
                        {{ $message->message_content }}
                      </div>
                      <p class="message-timestamp-right">{{$message->created_at}}</p>
                    </div>
                    <!-- Hiển thị tin nhắn trả lời -->
                    @foreach($message->replies as $reply)
                      <div class="message-reply-admin">
                        <div class="message-orange ms-3 col-6" data-comment_id="{{$reply->id}}">
                          <div class="message-content pb-4">
                            @if ($reply->message_parent_message !== null)
                              <div class="message-customer-reply-admin">
                                <span class="">
                                  <!-- Hiển thị nội dung tin nhắn được phản hồi -->
                                  {{ $message->message_content}}
                                </span>
                              </div>
                            @endif
                            {{ $reply->message_content }}
                          </div>
                          <p class="message-timestamp-right">{{$reply->created_at}}</p>
                        </div>
                      </div>
                    @endforeach   
                  </div>
                @endforeach
              </div>
            </div>
          </div>
          <div class="flex-grow-0 py-3 px-4 border-top">
            <div class="submit-message-input-button">
              <span class="reply-message-admin-span" data-user_id="{{$userId}}"></span>
              <input class="input-reply-message-admin_{{$message->user_id}} reply_message" data-user_id="{{$userId}}"  placeholder="Trả lời bình luận"></input>
              <button class="btn-reply-message" data-user_id="{{$userId}}">Trả lời</button>
            </div>
          </div>
          @endforeach 
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      var selectedCommentId = null;
      var selectedUserId = null;
      $('.message-reply-admin').on('click', '.message-blue', function() {
        selectedCommentId = $(this).data('comment_id');
        selectedUserId = $(this).data('user_id');
        var messageContent = $(this).find('.message-content').text();
        $('.reply-message-admin-span[data-user_id="' + selectedUserId + '"]').text(messageContent);
        $('.message-blue').css('background-color', '');
        $(this).css('background-color', 'yellow');
      });

      $('.btn-reply-message').click(function() {
        var userId = $(this).data('user_id');
        var messageContent = $('.input-reply-message-admin_'+userId).val();
        $.ajax({
          url: "{{ route('reply-message') }}",
          method: "POST",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            message_content: messageContent,
            user_id: userId,
            id: selectedCommentId 
          },
          success: function(data) {
            $('.input-reply-message-admin').val('');
            $('.reply-message-admin-span').text(''); 
            $('.message-blue').css('background-color', '');
            selectedCommentId = null;
            location.reload();
          },
          error: function(xhr, status, error) {
          }
        });
      });
  </script>
  <script>
    // Xử lý sự kiện khi click vào nút "user ID"
    $('.toggle-messages-button').click(function() {
        var userId = $(this).data('user_id');
        var messagesContainer = $(this).siblings('.messages-container');
        if (messagesContainer.is(':visible')) {
            messagesContainer.hide();
        } else {
            messagesContainer.show();
        }
    });

  function scrollToBottom() {
    var chatMessages = document.querySelector('.chat-messages');
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }
  scrollToBottom();
  </script>
@endsection
