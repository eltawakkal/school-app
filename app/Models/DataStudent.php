<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataStudent extends Model
{
    protected $fillable = [
        'data_parent_id',
        'name',
        'gender',
        'photo'
    ];

    public function parent()
    {
        return $this->belongsTo(DataParent::class, 'data_parent_id');
    }
}
