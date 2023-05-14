<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit(){
        return view('profile');
    }
    // Hesap bilgilerini güncelleme
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Hesap bilgileri güncellendi.');
    }

    // Hesabı silme
    public function destroy()
    {
        $user = auth()->user();

        // Hesabı silme işlemleri burada gerçekleştirilebilir
        // Örneğin, ilişkili kayıtların silinmesi veya kullanıcının devre dışı bırakılması

        // Kullanıcıyı oturumdan çıkış yap ve hesabı sil
        auth()->logout();
        $user->delete();

        return redirect('/')->with('success', 'Hesabınız başarıyla silindi.');
    }
}
