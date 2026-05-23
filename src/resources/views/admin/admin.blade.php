@extends('layouts.base')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<div class="admin">
    <div class="admin__heading">
        <h2 class="admin__heading-text">Admin</h2>
    </div>
    <div class="admin__category">
        <form class="admin__form" action="/admin/search" method="get">
            <input class="admin__input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />
            <select class="admin__select-gender "name="gender">
                <option value="" disabled {{ request('gender') == null ? 'selected' : '' }} >性別</option>
                <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }} >男性</option>
                <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }} >女性</option>
                <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }} >その他</option>
            </select>
            <select class="admin__select-category_id" name="category_id">
                <option value="" disabled {{ request('category_id') == null ? 'selected' : '' }}>お問い合わせの種類</option>
                <option value="1" {{ request('category_id') == '1' ? 'selected' : '' }} >1.商品のお届けについて</option>
                <option value="2" {{ request('category_id') == '2' ? 'selected' : '' }} >2.商品の交換について</option>
                <option value="3" {{ request('category_id') == '3' ? 'selected' : '' }} >3.商品トラブル</option>
                <option value="4" {{ request('category_id') == '4' ? 'selected' : '' }} >4.ショップへのお問い合わせ</option>
                <option value="5" {{ request('category_id') == '5' ? 'selected' : '' }} >5.その他</option>
            </select>
            <input class="calendar" type="date" name="date" value="{{ request('date') }}" />
            <button class="search__button" type="submit">検索</button>
        </form>
        <form class="reset__form" action="/reset" method="post">
            @csrf
            <button class="reset__button" type="button" onclick="location.href='{{ url('/admin/admin') }}'">リセット</button>
        </form>
    </div>
    <div class="export">
        <form class="export__form" action="/export" method="post">
            @csrf
            <button class="export__button" type="submit">エクスポート</button>
        </form>
        @if(isset($contacts))
        <div class="pagination">
            {{ $contacts->links() }}
        </div>
    </div>
    @endif
    <div class="admin__table">
        <table class="admin__table-inner">
            <tr class="admin__table-row">
                <th class="admin__table-header">お名前</th>
                <th class="admin__table-header">性別</th>
                <th class="admin__table-header">メールアドレス</th>
                <th class="admin__table-header">お問い合わせの種類</th>
                <th class="admin__table-header"></th>
            </tr>
            @if(!empty($contacts))
            @foreach ($contacts as $contact)
            <tr class="admin__table-category">
                <td class="admin__table-item">
                    {{ $contact->last_name }} {{$contact->first_name }}
                </td>
                <td class="admin__table-item">{{ $contact->gender }}</td>
                <td class="admin__table-item">{{ $contact->email }}</td>
                <td class="admin__table-item">{{ $contact->category->content}}</td>
                <td class="admin__table-item">
                    <a class="admin__table-item--link" href="">詳細
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection