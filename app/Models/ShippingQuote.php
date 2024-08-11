<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingQuote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shippingQuoteDetails(){
        return $this->hasOne(ShippingQuoteDetail::class, 'shipping_quote_id');
    }
}
