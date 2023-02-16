<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyList extends Model
{
    use HasFactory;
    public function  bank()
    {
        return $this->belongsTo(PolicyBank::class, 'bank_id', 'id');
    }
}
