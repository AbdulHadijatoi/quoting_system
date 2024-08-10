<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
    use HasFactory;

    public function shippingQuote(){
        return $this->belongsTo(ShippingQuote::class,'shipping_quote_id');
    }
}
