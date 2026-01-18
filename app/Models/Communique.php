<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Communique extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'deleted_at',
        'titleAr',
        'titleFr',
        'descriptionWAr',
        'descriptionWFr',
        'isPublished',

    ];
   
    

    
}
