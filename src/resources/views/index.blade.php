@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="index__content">
        <div class="index__heading">
            <h2>Contact</h2>
        </div>

        <form class="form" action="/contacts/confirm" method="POST">
            @csrf
            <div class="index-table">
                <table class="index-table__inner">
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">お名前 ※</label></th>
                        <td class="index-table__text--first_name"><input type="text" name="first_name"></td>
                        <td class="index-table__text--last_name"><input type="text" name="last_name"></td>
                    </tr>
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">性別 ※</label></th>
                        <td class="index-table__radio">
                            @foreach ($genders as $key => $label)
                                <label>
                                    <input type="radio" name="gender" value="{{ $key }}"
                                        {{ old('gender', '1') == $key ? 'checked' : '' }}>
                                    {{ $label }}
                                </label>
                            @endforeach
                        </td>
                    </tr>
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">メールアドレス ※</label></th>
                        <td class="index-table__text"><input type="email" name="email"></td>
                    </tr>
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">電話番号 ※</label></th>
                        <td class="index-table__text"><input type="tel" name="tel"></td>
                    </tr>
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">住所 ※</label></th>
                        <td class="index-table__text"><input type="text"name="address"></td>
                    </tr>
                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">建物名</label></th>
                        <td class="index-table__text"><input type="text" name="building"></td>
                    </tr>
                    <tr>
                        <th class="index-table__header">お問い合わせの種類 *</th>
                        <td>
                            <select class="index-form__item-select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                                @endforeach
                            </select>

                        </td>
                    </tr>


                    <tr class="index-table__row">
                        <th class="index-table__header"><label for="">お問い合わせ内容</label></th>
                        <td class="index-table__text">
                            {{-- <input type="text" name="detail" > --}}
                            <textarea name="detail" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="botton">
                <button type="submit">確認画面</button>
            </div>

        </form>
    </div>
@endsection
