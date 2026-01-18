<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    //
    use HasFactory;

    protected $fillable = [
       'imageurl',
        'titleAr' ,
        'titleFR',
        'descriptionAr',
        'descriptionfr' ,
        'start_at',
        'ends_at',
        'user_id' ,
        'isPublished',  

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
