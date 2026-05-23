@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')
<div class="login">
    <div class="login__title">
        <a class="login__title-text" href="/">Login</a>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="login__form">
            <div class="login__form-title">
                <span class="login__form-item">
                    メールアドレス
                </span>
            </div>
            <div class="login__form-content">
                <div class="login__form-input">
                    <input class="login__form-input--text" type="email" name="email" placeholder="例 test@example.com" value="{{ old('email') }}" >
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="login__form">
            <div class="login__form-title">
                <span class="login__form-item">
                    パスワード
                </span>
            </div>
            <div class="login__form-content">
                <div class="login__form-input">
                    <input class="login__form-input--text" type="password" name="password" placeholder="例：coachtech">
                </div>
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form__error">
                    @error('login')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="button">
            <button class="login__form-button" type="submit">
                ログイン
            </button>
        </div>
    </form>
</div>
@endsection