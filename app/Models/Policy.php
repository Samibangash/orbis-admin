<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function getDetailAttribute($value)
    {
        $getData = strip_tags($value);
        return substr($getData, 0, 150).'....';
    }
}
