@extends("layouts.app")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section("content")
<div class="confirm">
    <h2 class="confirm__title">Confirm</h2>

    @php
        $genderMap = [
            'male' => '男性',
            'female' => '女性',
            'other' => 'その他',
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];
        $categoryMap = [
            'product' => '商品の交換について',
            'shipping' => '配送について',
            'payment' => 'お支払いについて',
            'other' => 'その他',
            1 => '商品の交換について',
            2 => '配送について',
            3 => 'お支払いについて',
            4 => 'その他',
        ];
        $tel = ($contact['tel1']) . ($contact['tel2']) . ($contact['tel3']);
        $fullName = ($contact['last_name']) . ' ' . ($contact['first_name']);
    @endphp

    <div class="confirm__table">
        <form class="confirm__form" method="post" action="{{ url('/thanks') }}">
            @csrf

            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__head">お名前</th>
                    <td class="confirm-table__data">{{ $fullName }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">性別</th>
                    <td class="confirm-table__data">{{ $genderMap[$contact['gender']]}}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">メールアドレス</th>
                    <td class="confirm-table__data">{{ $contact['email']}}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">電話番号</th>
                    <td class="confirm-table__data">{{ $tel }}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">住所</th>
                    <td class="confirm-table__data">{{ $contact['address']}}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">建物名</th>
                    <td class="confirm-table__data">{{ $contact['building']}}</td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__head">お問い合わせの種類</th>
                    <td class="confirm-table__data">{{ $categoryMap[$contact['category']]}}</td>
                </tr>

                <tr class="confirm-table__row confirm-table__row--textarea">
                    <th class="confirm-table__head">お問い合わせ内容</th>
                    <td class="confirm-table__data">
                        {!! nl2br(e($contact['content'])) !!}
                    </td>
                </tr>
            </table>

            <input type="hidden" name="last_name" value="{{ $contact['last_name']}}" />
            <input type="hidden" name="first_name" value="{{ $contact['first_name']}}" />
            <input type="hidden" name="gender" value="{{ $contact['gender']}}" />
            <input type="hidden" name="email" value="{{ $contact['email']}}" />
            <input type="hidden" name="tel" value="{{ $tel }}" />
            <input type="hidden" name="address" value="{{ $contact['address']}}" />
            <input type="hidden" name="building" value="{{ $contact['building']}}" />
            <input type="hidden" name="category" value="{{ $contact['category']}}" />
            <input type="hidden" name="content" value="{{ $contact['content']}}" />

            <div class="confirm__actions">
                <button class="confirm__submit" type="submit" name="action" value="submit">送信</button>
                <button class="confirm__back" type="submit" name="action" value="back">修正</button>
            </div>
        </form>
    </div>
</div>
@endsection
