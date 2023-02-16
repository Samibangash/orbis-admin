<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;


    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
