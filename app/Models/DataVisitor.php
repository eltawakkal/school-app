<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataVisitor extends Model
{
    protected $fillable = [
        'visitor_type',
        'data_parent_id',
        'name',
        'data_manager_id',
        'data_student_id',
        'destinaition_name',
        'purpose',
        'is_overnight',
        'data_item_building_id',
    ];

    public function parent()
    {
        return $this->belongsTo(DataParent::class, 'data_parent_id');
    }
    public function student()
    {
        return $this->belongsTo(DataStudent::class, 'data_student_id');
    }
    public function building()
    {
        return $this->belongsTo(DataItemBuilding::class, 'data_item_building_id');
    }
    public function manager()
    {
        return $this->belongsTo(DataManager::class, 'data_manager_id');
    }
}
