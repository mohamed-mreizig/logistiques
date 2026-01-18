<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mooc extends Model
{
    protected $fillable = [
        'titleAr',
        'titleFr',
        'descriptionAr',
        'descriptionFr',
        'imageUrl',
        'isPublished',
        'user_id'
    ];
}