<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Motsdirect extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'NameWAr',
        'NameWFr',
        'descriptionWAr',
        'descriptionWFr',
        'isPublished',
        'imgUrl',
        'user_id',
        'created_at',
'updated_at'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
