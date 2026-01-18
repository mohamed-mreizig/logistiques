<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'deleted_at',
        'titleAr',
        'titleFr',
        'descriptionAr',
        'descriptionFR',
        'imgUrl',
        'isPublished',
        'user_id',
        'date_fin',
        'date_debut',
        'created_at',
        'updated_at',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //
}
