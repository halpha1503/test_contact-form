<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(["last_name","first_name","gender","email","tel1","tel2","tel3","address","building","category","content"]);
        return view("confirm", compact("contact"));
    }
    public function thanks(ContactRequest $request)
    {
        if ($request->input('action') === 'back') {
            return redirect('/')->withInput($request->except(['_token', 'action']));
        }

        $contact = $request->only(["last_name", "first_name", "gender", "email", "tel", "address", "building", "category", "content"]);
        Contact::create([
            'last_name' => $contact['last_name'],
            'first_name' => $contact['first_name'],
            'gender' => (int) $contact['gender'],
            'email' => $contact['email'],
            'tel' => $contact['tel'],
            'address' => $contact['address'],
            'building' => $contact['building'] ?? null,
            'categry_id' => (int) $contact['category'],
            'detail' => $contact['content'],
        ]);
        return view("thanks");
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
