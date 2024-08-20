@extends('layout.main')
@section('container')
    <div class="login">
        <form action="/registeruser" class="login__form" method="POST">
            @csrf
            <h1 class="login__title">Register</h1>
            <div class="login__content">
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="email" class="login__input" name="email" id="email" placeholder="" autofocus
                            required value="{{ old('email') }}">
                        <label for="email" class="login__label">Email</label>
                    </div>
                </div>
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="name" class="login__input" name="name" id="name" placeholder="" autofocus
                            required value="{{ old('name') }}">
                        <label for="name" class="login__label"></label>
                    </div>
                </div>
                <div class="login__box">
                    <i class="ri-user-3-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="bumn" class="login__input" name="bumn" id="bumn" placeholder="" autofocus
                            required value="{{ old('bumn') }}">
                        <label for="name" class="login__label"></label>
                    </div>
                </div>
                <div class="login__box">
                    <i class="ri-lock-2-line login__icon"></i>
                    <div class="login__box-input">
                        <input type="password" class="login__input" name="password" id="password" placeholder="" required>
                        <label for="password" class="login__label">Password</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="login__button">Daftar</button>
        </form>
    </div>
@endsection
