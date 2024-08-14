<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingQuoteDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shippingQuote(){
        return $this->belongsTo(ShippingQuote::class,'shipping_quote_id');
    }
    
    public function getIncoterm(){
        return $this->belongsTo(Incoterm::class,'incoterm','code');
    }
    
    public function measurementUnit(){
        return $this->belongsTo(MeasurementUnit::class,'measurement_unit','code');
    }
    
    public function originPort(){
        return $this->belongsTo(OriginPort::class,'origin_port','code');
    }
    
    public function merchandiseType(){
        return $this->belongsTo(MerchandiseType::class,'type_of_merchandise');
    }

    public function destinationLocation(){
        return $this->belongsTo(DestinationLocation::class,'destination_location');
    }

}
