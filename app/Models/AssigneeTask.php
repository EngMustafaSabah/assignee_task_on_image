<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssigneeTask extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'department_id',
        'user_id',
        'project_id',
        'top',
        'left',
        'status_id',
        'priority_id',
        'name',
        'date',
    ];

    public function StatusOfTask(){
        return $this->belongsTo(StatusOfTask::class,'status_id', 'id');
    }
}
