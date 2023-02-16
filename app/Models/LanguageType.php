<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageType extends Model
{
    use HasFactory;

    public const IS_English = 1;
    public const IS_Arabic = 2;
}
