<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOfTask extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'color',
    ];

    public function AssigneeTask(){
        return $this->hasOne(AssigneeTask::class);
    }
}
