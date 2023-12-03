@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="confirm__content">
    <div class="confirm__heading">
      <h2>お問い合わせ内容確認</h2>
    </div>
    <form class="form" action="/contacts" method="POST">
        @csrf
      <div class="confirm-table">
        <table class="confirm-table__inner">
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お名前</th>
            <td class="confirm-table__text">
              <input type="text" name="name" value="{{ $contact['first_name'] . ' ' . $contact['last_name']  }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">性別</th>
            <td class="confirm-table__text">
                @php
        $genderLabel = ($contact['gender'] === 1) ? '男性' : (($contact['gender'] === 2) ? '女性' : 'その他');
    @endphp
    {{ $genderLabel }}
              {{-- <input type="text" name="gender" value="{{ $contact['gender']=== '1' ? '男性' : ($contact['gender'] === '2' ? '女性' : 'その他')}}" /> --}}
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">メールアドレス</th>
            <td class="confirm-table__text">
              <input type="email" name="email" value="{{ $contact['email'] }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">電話番号</th>
            <td class="confirm-table__text">
                {{-- @isset($contact['tell'])
        {{ $contact['tell'] }}
    @else
        Tell not provided
    @endisset --}}
              <input type="tel" name="tel" value="{{ $contact['tel'] }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">住所</th>
            <td class="confirm-table__text">
              <input type="text" name="address" value="{{ $contact['address'] }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">建物</th>
            <td class="confirm-table__text">
              <input type="text" name="building" value="{{ $contact['building'] }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせの種類</th>
            <td class="confirm-table__text">
              <input type="text" name="category_id" value="{{ $category['content'] }}" />
            </td>
          </tr>
          <tr class="confirm-table__row">
            <th class="confirm-table__header">お問い合わせ内容</th>
            <td class="confirm-table__text">
                <input type="text" name="detail" value="{{ $contact['detail'] }}">
            </td>
          </tr>
        </table>
      </div>
      <div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
      </div>
    </form>
  </div>

  @endsection
