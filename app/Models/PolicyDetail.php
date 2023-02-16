<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyDetail extends Model
{
    use HasFactory;
   
    public function  bank()
    {
        return $this->belongsTo(PolicyBank::class, 'bank_id', 'id');
    }
    public function  policy()
    {
        return $this->belongsTo(PolicyList::class, 'policy_id', 'id');
    }
}
