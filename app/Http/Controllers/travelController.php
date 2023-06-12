<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Travel;

class TravelController extends Controller
{
    public function index()
    {
        $travel = Travel::all();

        return view('travel', compact('travel'));
    }
    public function search(Request $request)
    {
        $departure = $request->input('departure');
        $destination = $request->input('destination');
        $date = $request->input('date');

        $travels = Travel::where('departure', 'like', "%$departure%")
            ->where('destination', 'like', "%$destination%")
            ->whereDate('travel_date', $date)
            ->get();

        if ($travels->isEmpty()) {
            return view('travel')->with('travel', $travels)->with('message', 'Hiç yolculuk bulunmuyor.');
        } else {
            return view('travel')->with('travel', $travels);
        }
    }



}


