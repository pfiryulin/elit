@extends('layouts.app')
@section('content')
        <div class="form__body registration">
            <form method="POST" action="{{ route('user.login') }}" >

                <input type="text" placeholder="Логин" name="login">
                <input type="password" name="password" id="" placeholder="Пароль">
                <input type="submit" value="Войти">
                @csrf
            </form>
            <div class="form__links">
                <a href="{{ route('user.registration') }}" data-method="GET">Зарегестрироваться</a>
            </div>
        </div>
@endsection('content')
