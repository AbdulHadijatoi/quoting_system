<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingQuote extends Model
{
    use HasFactory;

    public function quoteDetails(){
        return $this->hasOne(QuoteDetail::class, 'shipping_quote_id');
    }
}
