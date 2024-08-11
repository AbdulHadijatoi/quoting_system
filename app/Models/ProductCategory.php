<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function merchandiseTypes(){
        return $this->hasMany(MerchandiseType::class,'product_category_id');
    }
}
