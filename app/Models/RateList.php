<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateList extends Model
{
    use HasFactory;

    public const Is_Fixed = 1;
    public const Is_Variable = 2;

    public function bank(){
        return $this->belongsTo(RateBank::class, 'bank_id', 'id');
    }
}
