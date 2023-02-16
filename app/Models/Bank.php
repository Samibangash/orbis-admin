<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public static function get_all()
    {
        return self::query()->select('id', 'name')->where('active', 1)->get();
    }

}
