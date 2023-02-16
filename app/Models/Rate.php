<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['type','bank_id','active'];
    use HasFactory;

    public const Is_Fixed = 1;
    public const Is_Variable = 2;

    public function rateValues()
    {
        return $this->hasMany(RateValue::class, 'rate_id', 'id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

}
