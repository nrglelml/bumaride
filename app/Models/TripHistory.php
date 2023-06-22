<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class TripHistory extends Model
{
    use HasFactory;
    protected $table = 'trip_history';

    protected $fillable = [
        'user_id',
        'departure',
        'destination',
        'date',
        'description',
        'people_num',
        'travel_id'


    ];
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

}
