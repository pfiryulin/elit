@extends('layouts.app')
    @section('content')
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
    @endsection('content')

