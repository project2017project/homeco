<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyBill extends Model
{
    use HasFactory;

    public function bill(){
        return $this->belongsTo(Bill::class)->select('id','bill');
    }

    protected $casts =  [
        'id' => 'integer',
        'bill_id' => 'integer',
        'property_id' => 'integer',
    ];

}
