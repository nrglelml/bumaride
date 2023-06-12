<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;

class MyTripsController extends Controller
{
    public function index()
    {

        $trips = Trip::where('user_id', Auth::user()->id)->get();

        return view('mytrips', compact('trips'));
    }
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('mytrips')->with('success', 'Yolculuk başarıyla kaldırıldı.');
    }


}
