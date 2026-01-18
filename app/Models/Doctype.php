<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Doctype extends Model
{
    //
    use HasFactory;

    protected $fillable = [ 'id',
        'isPublished',
        'footer',
    'user_id',
    'created_at',
    'updated_at',
'type'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
