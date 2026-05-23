@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('content')
<div class="register">
    <div class="register__title">
        <a class="register__title-text" href="/">Register</a>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="register__form">
            <div class="register__form-title">
                <span class="register__form-item">
                    お名前
                </span>
            </div>
            <div class="register__form-content">
                <div class="register__form-input">
                    <input class="register__form-input--text" type="text" name="name" value="{{ old('name') }}" placeholder="例 山田 太郎"/>
                </div>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__form">
            <div class="register__form-title">
                <span class="register__form-item">
                    メールアドレス
                </span>
            </div>
            <div class="register__form-content">
                <div class="register__form-input">
                    <input class="register__form-input--text" type="email" name="email" value="{{ old('email') }}" placeholder="例 test@example.com" >
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="register__form">
            <div class="register__form-title">
                <span class="register__form-item">
                    パスワード
                </span>
            </div>
            <div class="register__form-content">
                <div class="register__form-input">
                    <input class="register__form-input--text" type="password" name="password" placeholder="例：coachtech">
                </div>
                <div class="form__error">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        <div class="button">
            <button class="register__form-button" type="submit">
                登録
            </button>
        </div>
    </form>
</div>

@endsection