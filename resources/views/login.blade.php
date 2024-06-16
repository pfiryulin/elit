<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content = {{ csrf_token() }}>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    @csrf
    <div class="container">
        <div class="form__body registration">
            <form method="POST" action="{{ route('user.login') }}">

                <input type="text" placeholder="Логин" name="login">
                <input type="password" name="password" id="" placeholder="Пароль">
                <input type="submit" value="Войти">
                @csrf
            </form>
            <div class="form__links">
                <a href="{{ route('user.registration') }}">Зарегестрироваться</a>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
