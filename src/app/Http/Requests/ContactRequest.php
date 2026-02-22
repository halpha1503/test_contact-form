<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'last_name' => ['required', 'string', 'max:8'],
            'first_name' => ['required', 'string', 'max:8'],
            'gender' => ['required', 'integer', Rule::in([1, 2, 3])],
            'email' => ['required', 'email', 'max:255'],
            'tel1' => ['required', 'digits_between:3,5'],
            'tel2' => ['required', 'digits_between:3,5'],
            'tel3' => ['required', 'digits_between:3,5'],
            'address' => ['required', 'string', 'max:255'],
            'building' => ['nullable', 'string', 'max:255'],
            'category' => ['required', 'integer', Rule::in([1, 2, 3, 4])],
            'content' => ['required', 'string', 'max:120'],
            'action' => ['nullable', 'string', Rule::in(['submit', 'back'])],
        ];
    }

    public function attributes(): array
    {
        return [
            'last_name' => '姓',
            'first_name' => '名',
            'gender' => '性別',
            'email' => 'メールアドレス',
            'tel1' => '電話番号1',
            'tel2' => '電話番号2',
            'tel3' => '電話番号3',
            'address' => '住所',
            'building' => '建物名',
            'category' => 'お問い合わせの種類',
            'content' => 'お問い合わせ内容',
            'action' => '操作',
        ];
    }
    public function messages(): array
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'gender.in' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel1.required' => '電話番号を入力してください',
            'tel2.required' => '電話番号を入力してください',
            'tel3.required' => '電話番号を入力してください',
            'tel1.regex' => '電話番号は 半角英数字で入力してください',
            'tel2.regex' => '電話番号は 半角英数字で入力してください',
            'tel3.regex' => '電話番号は 半角英数字で入力してください',
            'tel1.max_digits' => '電話番号は 5桁まで数字で入力してください',
            'tel2.max_digits' => '電話番号は 5桁まで数字で入力してください',
            'tel3.max_digits' => '電話番号は 5桁まで数字で入力してください',
            'tel1.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'tel2.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'tel3.digits_between' => '電話番号は 5桁まで数字で入力してください',
            'tel.required' => '電話番号を入力してください',
            'tel.regex' => '電話番号は 半角英数字で入力してください',
            'address.required' => '住所を入力してください',
            'category.required' => 'お問い合わせの種類を選択してください',
            'category.in' => 'お問い合わせの種類を選択してください',
            'content.required' => 'お問い合わせ内容を入力してください',
            'content.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
    public function contactPayload(): array
    {
        $contact = $this->validated();
        return [
            'last_name' => $contact['last_name'],
            'first_name' => $contact['first_name'],
            'gender' => (int) $contact['gender'],
            'email' => $contact['email'],
            'tel' => $contact['tel'],
            'address' => $contact['address'],
            'building' => $contact['building'] ?? null,
            'categry_id' => (int) $contact['category'],
            'detail' => $contact['content'],
        ];
    }
}