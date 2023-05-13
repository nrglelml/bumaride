<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    // Profil düzenleme sayfasını görüntüler
    public function edit()
    {
        return view('profile');
    }

    // Profil bilgilerini günceller
    public function update(Request $request)
    {
        $user = auth()->user();

        // Form verilerini doğrula
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Kullanıcının ad ve e-posta bilgilerini güncelle
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profil bilgileriniz güncellendi.');
    }
}
