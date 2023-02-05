<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{asset('frontend/img/kisspng-light-fire-flame-logo-symbol-fire-letter-5ac5dab338f111.3018131215229160192332.jpg')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <div class="login-form-header">
        <form action="{{route('getlogin')}}" method="post" class="form">
            @csrf
            <div class="heading-login">
                <h3 class="heading">Đăng nhập</h3>
            </div>
            <div class="form-group invalid">
                <label for="fullnamee" class="form-label">Email</label>
                <input type="text" name="admin_email" class="form-control" placeholder="@gmail.com" required="">
                <span class="form-mesage"></span>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="admin_password" class="form-control" placeholder="Nhập mật khẩu" required="">
                <span class="form-mesage"></span>
            </div>

            <button type="submit" class="form-submit">Đăng Nhập</button>
        </form>   
    </div>
   


    
</body>