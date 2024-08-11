<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationLocation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function zone(){
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
