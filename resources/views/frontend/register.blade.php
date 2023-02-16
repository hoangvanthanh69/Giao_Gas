<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="grid">
        <div class="icon-login-user">
                <div class="icon-name-login">
                    <a href="{{route('home')}}">
                        <strong class="logo-name-gas">
                            Gas
                        </strong>
                            Tech
                    </a>
                </div>
                <div>Đăng ký</div>
        </div>
    </div> 

    <div class="login-form-header-user home-filter-user-login">
        <div class="col-8 form-img-user">
            <img src="{{asset('frontend/img/qUWlvmuHovb77ZoDTOahjxDTYkzQsqVWP0Ar1UEP.jpg')}}" >   
        </div>
        <div class="col-4 form-user">
            
        <form method="POST" action="{{route('registers')}}">
            @csrf
            <h3 class="heading">Đăng ký</h3>
            <div class="form-group form-submit-user">
                <label for="name" class="form-label">Họ tên</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                <span class="form-mesage"></span>
            </div>
            <div class="form-group form-submit-user">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" placeholder="@gmail.com" value="{{ old('email') }}" required>
                <span class="form-mesage"></span>
            </div>
            
            <div class="form-group form-submit-user">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" type="password" name="password" class="form-control" required>
                <span class="form-mesage"></span>
            </div>
            <div class="form-group form-submit-user">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
                <span class="form-mesage"></span>
            </div>
            <div>
                <button type="submit" class="form-submit form-submit-register">
                    Đăng ký
                </button>
            </div>
            <p class="">
                    Bạn đã có tài khoản? 
                    <a href="{{route('dangnhap')}}"> Đăng Nhập</a>
                </p>
        </form>
            
        </div>
    </div>
    <!-- <div class="footer-imge">
        <div class="footer-imge-license footer-imge-user">
            © HoangThanh
        </div>
    </div> -->
</body>