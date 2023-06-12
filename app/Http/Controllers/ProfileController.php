<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('home', compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'username' => 'required|max:255|unique:users,username,' . $user->id,
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'about' => 'nullable|string|max:300',
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

    public function vehicle_info(Request $request)
    {
        $user = Auth::user();

        $user->vehicle_info = [
            'brand' => $request->input('vehicle_brand'),
            'model' => $request->input('vehicle_model'),
            'year' => $request->input('vehicle_year'),
            'capacity' => $request->input('vehicle_capacity'),
        ];

        $user->save();

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

    public function uploadProfileImage(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|min:200',
        ]);

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $imagePath = $profileImage->store('profile_images', 'public');
            $user->profile_image = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profil resmi yüklendi.');
    }

    public function deleteProfileImage()
    {
        $user = Auth::user();
        if ($user->profile_image) {
            Storage::delete($user->profile_image);
            $user->profile_image = null;
            $user->save();
        }
        else{
            return redirect()->back()->with('error', 'Profil resmi bulunamadı.');
        }

        return redirect()->back()->with('success', 'Profil resmi başarıyla kaldırıldı.');
    }

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        $user->delete();

        Auth::logout();

        $request->session()->flash('success', 'Hesabınız başarıyla silindi.');

        return redirect()->route('index');
    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Geçerli şifrenizi yanlış girdiniz.']);
        }
        $user->password = Hash::make($request->input('password'));
        $user->save();

        session()->flash('success', 'Şifreniz başarıyla güncellendi.');

        return redirect()->route('profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index')->with('success', 'Çıkış yapıldı.');
    }
}
