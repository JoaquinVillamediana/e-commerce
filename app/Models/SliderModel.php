<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SliderModel extends Model
{
    use SoftDeletes;
    protected $table = 'slider';
    
    protected $fillable = [
        'image',
        'name',
        'description'
     

        
        
   
        
    ];

    protected $dates = ['deleted_at'];

}