<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataManager extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'data_item_position_id',
        'phone',
        'photo'
    ];

    public function position()
    {
        return $this->belongsTo(DataItemPosition::class, 'data_item_position_id');
    }
}
