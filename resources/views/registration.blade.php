@extends('layouts.app')
    @section('content')
        <div class="form__body registration">
            <form action="/registration" method="POST">
                <input type="text" placeholder="ФИО" name="name">
                <input type="text" placeholder="Телефон" name="login">
                <input type="email" placeholder="E-mail" name="email">
                <input type="password" name="password" placeholder="Пароль">
                <input type="password" name="repeatpassword" placeholder="Повторите Пароль">
                @csrf
                <input type="submit" value="Регистрация">
            </form>
            <div class="form__links">
                <a href="{{ route('user.login') }}" data-method="GET">Уже есть акаунт</a>
            </div>
        </div>
    @endsection('content')
