<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenderDirectory extends Model
{
    use HasFactory;

    public function bank(){
        return $this->belongsTo(LenderBank::class, 'bank_id', 'id');
    }
}
