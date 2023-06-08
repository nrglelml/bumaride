<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;

class createTripController extends Controller
{
    public function createTrip(Request $request){
    $request->validate([
        'departure' => 'required',
        'destination' => 'required',
        'date' => 'required',
    ]);
    if (Auth::check()) {
        $departure = $request->input('departure');
        $destination = $request->input('destination');
        $date = $request->input('date');


        $trip = new Trip();
        $trip->departure = $departure;
        $trip->destination = $destination;
        $trip->date = $date;


        $trip->user_id = Auth::user()->id;


        $trip->save();


        return redirect()->back()->with('success', 'Yolculuk başarıyla oluşturuldu.');
    }


    return redirect()->route('login')->with('error', 'Yolculuk oluşturmak için giriş yapmanız gerekmektedir.');
}
}
