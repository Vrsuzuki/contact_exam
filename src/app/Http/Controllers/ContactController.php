<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
      $contact = session('contact', [
        'last_name' => old('last_name', ''),
        'first_name' => old('first_name', ''),
        'gender' => old('gender', ''),
        'email' => old('email', ''),
        'tel-1' => old('tel-1', ''),
        'tel-2' => old('tel-2', ''),
        'tel-3' => old('tel-3', ''),
        'address' => old('address', ''),
        'building' => old('building', ''),
        'category_id' => old('category_id', ''),
        'detail' => old('detail', ''),
    ]);

      return view('index', compact('contact'));
    }

    public function confirm(Request $request)
    {
      $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel-1', 'tel-2', 'tel-3', 'address', 'building', 'category_id', 'detail']);
      session(['contact' => $contact]);
      return view('confirm', compact('contact'));
    }

    public function backToForm(Request $request)
    {
      return redirect('/')->withInput();
    }
}
