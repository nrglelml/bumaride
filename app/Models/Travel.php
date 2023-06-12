<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable = ['title', 'travel_date', 'user_id'];

    public function user()
    {
         $this->belongsTo(User::class);
          $this->hasMany(Trip::class);
    }


}
