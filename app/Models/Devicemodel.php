<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devicemodel extends Model
{
     protected $fillable = [
        'type',
        'type_eq',
        'brand',
        'model',
        'eq_no',
        'eq_number',
        'eq_number_it',
        'service_life',
        'os',
        'accessories',
        'status',
        'deleted',
        'path_img',
    ];
}
