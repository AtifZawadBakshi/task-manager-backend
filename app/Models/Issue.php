<?php

namespace App\Models;

use App\Models\Regulation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Issue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function regulations(){
        return $this->hasMany(Regulation::class,'case_id', 'id')->where('type', 0);
    }

    public function queries(){
        // return $this->belongsTo(Query::class, 'case_id', 'id');
        return $this->hasMany(Query::class,'case_id', 'id');
    }

}
