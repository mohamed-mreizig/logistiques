<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{

    //ç
    use HasFactory;

    protected $fillable = [
        'deleted_at',
        'titleAr',
        'titleFr',
        'descriptionAr',
        'descriptionFr',
        'created_at',
        'updated_at',
        'linkurl',
        'isPublished',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
