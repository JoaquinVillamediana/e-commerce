<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubModel extends Model
{
    use SoftDeletes;
    protected $table = 'sub_categorie';
    
    protected $fillable = [
        'name',
        'categorie',
        'description'
    ];

    protected $dates = ['deleted_at'];
}