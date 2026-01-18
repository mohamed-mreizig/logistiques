<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'deleted_at',
        'titleAr',
        'titleFr',
        'doctype_id',
        'fileUrl',
        'isPublished',
        'user_id',
        'created_at',
        'updated_at',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function doctype()
    {
        return $this->belongsTo(Doctype::class);
    }
}
