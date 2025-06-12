<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySecuritysafety extends Model
{
    use HasFactory;

    public function securitysafety(){
        return $this->belongsTo(Securitysafety::class)->select('id','securitysafety','item1_icon');
    }

    protected $casts =  [
        'id' => 'integer',
        'securitysafety_id' => 'integer',
        'property_id' => 'integer',
    ];

}
