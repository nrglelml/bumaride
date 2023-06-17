<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trip;
use App\Models\TripHistory;

class MyTripsController extends Controller
{
    public function index()
    {

        $trips = Trip::where('user_id', Auth::user()->id)->get();
        $historyTrips = TripHistory::all();


        return view('mytrips', compact('trips', 'historyTrips'));
    }
    public function destroy($id)
    {
        $trip = Trip::findOrFail($id);

        TripHistory::create([
            'user_id' => Auth::user()->id,
            'departure' => $trip->departure,
            'destination' => $trip->destination,
            'date' => $trip->date,
            'description' => $trip->description,
            'people_num' => $trip->people_num,

        ]);

        $trip->delete();

        return redirect()->route('mytrips')->with('success', 'Yolculuk başarıyla kaldırıldı.');
    }



}
