<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subtask(){
        return $this->hasMany(sub_task::class, 'task_id', 'id');
    }
}
