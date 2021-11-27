<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Category extends Model
{
    use HasFactory, HasRoles;

    protected $guard_name = 'web';
    // protected $table = 'categories';

    protected $fillable = [
        'name_ar',
        'name_en'
    ];
}
