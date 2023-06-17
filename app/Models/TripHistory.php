<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripHistory extends Model
{
    use HasFactory;
    protected $table = 'trip_history';

    protected $fillable = [
        'departure',
        'destination',
        'date',
        'description',
        'people_num',
        'user_id'
    ];

}
