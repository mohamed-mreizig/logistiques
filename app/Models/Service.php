<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'deleted_at',
     'created_at',
     'updated_at',
        'descriptionAr',
        'descriptionFr',
        'user_id',
        'titleAr',
        'titleFr',
       'servicetype_id',
        'imgUrl',
        'isPublished',
        'deleted_at'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function servicetype()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
