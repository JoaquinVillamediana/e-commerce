<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryModel extends Model
{
    use SoftDeletes;
    protected $table = 'history';
    
    protected $fillable = [
        'search',
        'user_id'
        
    ];

    protected $dates = ['deleted_at'];
}