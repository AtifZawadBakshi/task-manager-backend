<?php

namespace App\Models;

use App\Models\Issue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Regulation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function issues(){
        return $this->belongsTo(Issue::class, 'case_id', 'id');
    }

    public function queries(){
        return $this->belongsTo(Query::class, 'case_id', 'id');
    }
}
