<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->all();

        $contact['tel'] =
            $request->tel1. $request->tel2. $request->tel3;
        $categories = [
            1 => '商品のお届けについて',
            2 => '商品の交換について',
            3 => '商品トラブル',
            4 => 'ショップへのお問い合わせ',
            5 => 'その他',
        ];
        $contact['category_name'] =
            $categories[$contact['category_id']];

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        if ($request->action === 'back') {
            return redirect('/')->withInput();
        }
        
        $contact = $request->all();

        $contact['tel'] =
            $request->tel1. $request->tel2. $request->tel3;

        Contact::create($contact);

            return view('thanks');
    }
}
