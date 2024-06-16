<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
    @csrf
    <div class="container">
        <div class="form__body registration">
            <form action="/user/check">
                <input type="text" placeholder="Логин" name="login">
                <input type="password" name="password" id="" placeholder="Пароль">
                <input type="submit" value="Войти">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            <div class="form__links">
                <a href="registrationform.html">Зарегестрироваться</a>
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>
