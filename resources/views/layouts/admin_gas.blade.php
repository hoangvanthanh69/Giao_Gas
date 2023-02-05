<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin</title>
      <link rel="icon" type="image/png" href="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}">
      <link rel="stylesheet" href="{{asset('backend/css/home_admin.css')}}">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   </head>

   <body>
      <div class="main ">
         <div class="row main-row container-fluid">
            <div class="col-2 nav-row-2">
               <div class="row-2-ul">
                  <ul class="nav flex-column ">
                     <div class="logout-admin">
                        <span>Admin</span>
                        <span>
                        <a href="{{route('logout')}}">Logout
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                        </span>
                     </div>

                     <div class="home-filter border-filet-butoon" id="filter_button">
                        <div class="btnbtn home-filter-button " data-filter="all">
                           <a class="@yield('sidebar-active-home')" href="{{route('admin')}}">
                              <i class=" fa fa-home " aria-hidden="true"></i>
                              Trang chủ
                           </a>
                        </div>
                        <br>

                        <div class="btnbtn home-filter-button" data-filter="product">
                           <a class="@yield('sidebar-active-product')" href="{{route('quan-ly-sp')}}">
                              <i class="fas fa-box"></i>
                              Quản lý sản phẩm 
                           </a>
                        </div>
                        <br>

                        <div class="btnbtn home-filter-button" data-filter="staff">
                           <a class="@yield('sidebar-active-customer')" href="{{route('quan-ly-nv')}}">
                              <i class="fas fa-clipboard-user"></i>
                              Quản lý nhân viên
                           </a>
                        </div>
                        <br>

                        <div class="btnbtn home-filter-button" data-filter="receipt">
                           <a class="@yield('sidebar-active-orders')" href="{{route('quan-ly-hd')}}">
                              <i class="fas fa-file-invoice-dollar"></i>
                              Quản lý hóa đơn
                           </a>
                        </div>
                        <br>

                        <div class="btnbtn home-filter-button" data-filter="receipt">
                           <a class="@yield('sidebar-active-thong-ke')" href="{{route('quan-ly-thong-ke')}}">
                              <i class="fas fa-file-invoice-dollar"></i>
                              Quản lý thống kê
                           </a>
                        </div>
                     </div>

                     
                  </ul>
               </div>
            </div>

            @yield('content')

            <footer class="sticky-footer">
               <div class="container">
                  <div class="text-center">
                     <small>© HoangThanh</small>
                  </div>
               </div>
            </footer>
            
         </div>
      </div>
      </div>
      <script src="{{asset('backend/js/admin.js')}}"></script>
   </body>
</html>