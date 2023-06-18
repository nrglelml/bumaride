<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['departure', 'destination', 'date', 'description', 'people_num', 'user_id','travel_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
