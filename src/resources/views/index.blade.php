@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact">
    <div class="contact__heading">
        <h2 class="contact__heading-text">Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お名前</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-text--name" type="text" name="last_name" placeholder="例 山田" value="{{ old('last_name') }}" />
                    <input class="form__input-text--name" type="text" name="first_name" placeholder="例 太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                    @error('first_name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">性別</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <label class="form__input-item">
                        <input type="radio" name="gender" {{ old('gender') == '男性' ? 'checked' : '' }} value="男性" > 男性</label>
                    <label class="form__input-item">
                        <input type="radio" name="gender" {{ old('gender') == '女性' ? 'checked' : '' }} value="女性" > 女性</label>
                    <label class="form__input-item">
                        <input type="radio" name="gender" {{ old('gender') == 'その他' ? 'checked' : '' }} value="その他" > その他</label>
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">メールアドレス</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-text" type="email" name="email" placeholder="例 test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">電話番号</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-text--tel" type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}" />
                    -
                    <input class="form__input-text--tel" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                    -
                    <input class="form__input-text--tel" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                </div>
                <div class="form__error">
                    @error('tel1')
                        {{ $message }}
                    @enderror
                    @error('tel2')
                        {{ $message }}
                    @enderror
                    @error('tel3')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">住所</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-text" type="text" name="address" placeholder="例 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">建物名</span>
                <span class="form__label-required"></span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <input class="form__input-text" type="text" name="building" placeholder="例 千駄ヶ谷マンション101" value="{{ old('building') }}" />
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お問い合わせの種類</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <select name="category_id">
                        <option value="" disabled {{ old('category_id') == null ? 'selected' : '' }}>選択してください</option>
                        <option value="1" {{ old('category_id') == '1' ? 'selected' : '' }} >1.商品のお届けについて</option>
                        <option value="2" {{ old('category_id') == '2' ? 'selected' : '' }} >2.商品の交換について</option>
                        <option value="3" {{ old('category_id') == '3' ? 'selected' : '' }} >3.商品トラブル</option>
                        <option value="4" {{ old('category_id') == '4' ? 'selected' : '' }} >4.ショップへのお問い合わせ</option>
                        <option value="5" {{ old('category_id') == '5' ? 'selected' : '' }} >5.その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label-item">お問い合わせの内容</span>
                <span class="form__label-required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input">
                    <textarea class="form__input-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください" >{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="button">
            <button class="contact__form-button" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection