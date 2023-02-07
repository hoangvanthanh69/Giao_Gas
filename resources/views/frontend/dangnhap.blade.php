<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản</title>
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
        <div>Đăng nhập</div>
   </div>
</div>
   <div class="login-form-header-user home-filter-user-login">
        <form action="" method="POST" class="form-user" id="form-1">
            <h3 class="heading">Đăng nhập</h3>
            <div class="form-group ">
                <label for="email" class="form-label">Email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="VD vanthanh@gmail.com">
                <span class="form-mesage"></span>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                <span class="form-mesage"></span>
            </div>
            <!-- <div class="form-group">
                <label for="password-confirmation" class="form-label">Nhập lại mật khẩu</label>
                <input type="password" id="password-confirmation" name="password-confirmation" class="form-control" placeholder="Nhập lại mật khẩu">
                <span class="form-mesage"></span>
            </div> -->
            <button class="form-submit">Đăng Nhập</button>
            <button class="form-submit form-submit-register">Đăng Kí</button>
        </form>
   </div>
</body>