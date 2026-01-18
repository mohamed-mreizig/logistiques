<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicetype extends Model
{
    //
    use HasFactory;

    protected $fillable = [ 'id',
        'isPublished',
    'user_id',
    'created_at',
    'updated_at',
'type'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
