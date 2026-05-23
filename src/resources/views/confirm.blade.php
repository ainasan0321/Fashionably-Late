@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm">
    <div class="confirm__heading">
        <h2 class="confirm__heading-text">Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post" >
        @csrf
        <div class="confirm__table">
            <table class="confirm__table-inner">
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">お名前</th>
                    <td class="confirm__table-text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">性別</th>
                    <td class="confirm__table-text">
                        {{ $contact['gender'] }}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">メールアドレス</th>
                    <td class="confirm__table-text">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">電話番号</th>
                    <td class="confirm__table-text">
                        {{ $contact['tel'] }}
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">住所</th>
                    <td class="confirm__table-text">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">建物名</th>
                    <td class="confirm__table-text">
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">お問い合わせ種類</th>
                    <td class="confirm__table-text">
                        {{ $contact['category_name'] }}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                    </td>
                </tr>
                <tr class="confirm__table-row">
                    <th class="confirm__table-header">お問い合わせ内容</th>
                    <td class="confirm__table-text">
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="button">
            <div class="form__button">
                <button class="form__button-submit" type="submit">送信</button>
            </div>
            <div class="update__button">
                <button class="update__button-submit" name="action" value="back">
                    修正
                </button>
            </div>
        </div>
    </form>
</div>
@endsection