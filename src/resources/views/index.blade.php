@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section("content")
    <div class="contact">
        <h2 class="contact__title">Contact</h2>

        <form class="form" action="{{ url('/confirm') }}" method="post">
            @csrf

            <div class="form__group">
                <div class="form__label">
                    <span>お名前</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <div class="form__row">
                        <input class="input" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="例: 山田" />
                        <input class="input" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="例: 太郎" />
                    </div>
                    <p class="form__error">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                        @error('first_name')
                            @if($errors->has('last_name'))<br>@endif
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>性別</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <div class="radio">
                        <label class="radio__item">
                            <input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }}>
                            <span>男性</span>
                        </label>

                        <label class="radio__item">
                            <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
                            <span>女性</span>
                        </label>

                        <label class="radio__item">
                            <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }}>
                            <span>その他</span>
                        </label>
                    </div>
                    <p class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>メールアドレス</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <input class="input input--full" type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com" />
                    <p class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>電話番号</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <div class="tel">
                        <input class="input tel__box" type="tel" name="tel1" value="{{ old('tel1') }}" inputmode="numeric" placeholder="080" />
                        <span class="tel__sep">-</span>
                        <input class="input tel__box" type="tel" name="tel2" value="{{ old('tel2') }}" inputmode="numeric" placeholder="1234" />
                        <span class="tel__sep">-</span>
                        <input class="input tel__box" type="tel" name="tel3" value="{{ old('tel3') }}" inputmode="numeric" placeholder="5678" />
                    </div>
                    <p class="form__error">
                        @error('tel1')
                            {{ $message }}
                        @enderror
                        @error('tel2')
                            @if($errors->has('tel1'))<br>@endif
                            {{ $message }}
                        @enderror
                        @error('tel3')
                            @if($errors->has('tel1') || $errors->has('tel2'))<br>@endif
                            {{ $message }}
                        @enderror
                        @error('tel')
                            @if($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))<br>@endif
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>住所</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <input class="input input--full" type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" />
                    <p class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>建物名</span>
                </div>
                <div class="form__control">
                    <input class="input input--full" type="text" name="building" value="{{ old('building') }}" placeholder="例: 千駄ヶ谷マンション101" />
                    <p class="form__error">
                        @error('building')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group">
                <div class="form__label">
                    <span>お問い合わせの種類</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <div class="select">
                        <select class="select__body" name="category">
                            <option value="" disabled {{ old('category') === null ? 'selected' : '' }}>選択してください</option>
                            <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>商品の交換について</option>
                            <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>配送について</option>
                            <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>お支払いについて</option>
                            <option value="4" {{ old('category') == '4' ? 'selected' : '' }}>その他</option>
                        </select>
                    </div>
                    <p class="form__error">
                        @error('category')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__group form__group--textarea">
                <div class="form__label">
                    <span>お問い合わせ内容</span>
                    <span class="form__required">※</span>
                </div>
                <div class="form__control">
                    <textarea class="textarea" name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
                    <p class="form__error">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
            </div>

            <div class="form__actions">
                <button class="button" type="submit">確認画面</button>
            </div>
        </form>
    </div>
@endsection