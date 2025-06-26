<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataParent extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'photo',
    ];
}
