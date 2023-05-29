<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'about' => 'nullable|string|max:300',
            'vehicle_info'=>'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->about = $request->input('about');


        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $imagePath = $profileImage->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil güncellendi.');
    }

    public function viewAbout()
    {
        $user = Auth::user();

        return view('profile.about', compact('user'));
    }

    public function updateAbout(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'about' => 'nullable|string',
        ]);

        $user->about = $request->about;

        $user->save();

        return redirect()->back()->with('success', 'Hakkında bilgisi güncellendi.');
    }

    public function addVehicle(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'vehicle_name' => 'required|string|max:255',
            'vehicle_type' => 'required|string|max:255',
            'vehicle_plate' =>'required|string|max:10|min:4',
        ]);

        // Taşıt bilgisi ekleme işlemlerini burada gerçekleştirin

        return redirect()->back()->with('success', 'Taşıt bilgisi eklendi.');
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Hesap bilgileri güncellendi.');
    }

    public function viewComments()
    {
        $user = Auth::user();

        // Hakkında yapılan yorumları görüntüleme işlemlerini burada gerçekleştirin

        return view('profile.comments', compact('user'));
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        // Kullanıcıyı sil
        $user->delete();

        // Oturumu sonlandır
        Auth::logout();

        // Başarılı mesajı ekle
        $request->session()->flash('success', 'Hesabınız başarıyla silindi.');

        // Ana sayfaya yönlendir
        return redirect()->route('index');
    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('index')->with('success', 'Çıkış yapıldı.');
    }
}
