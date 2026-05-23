<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
        public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);

        return view('admin.admin', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::with('category')->find($id);

        return view('admin.admin', compact('contact'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch(
            $request->keyword,
            $request->gender,
            $request->category_id,
            $request->date
        )
        ->paginate(7);

        return view('admin.admin',compact('contacts'));
    }
}
