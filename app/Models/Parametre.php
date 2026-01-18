<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Parametre extends Model
{
    //
    use HasFactory;
protected $fillable = [
    'deleted_at',
    'NameWAr',
    'NameWFr',
    'descriptionWAr',
    'descriptionWFr',
     'imgUrl',
     'telephone',
     'adressAr',
     'adressFR',
     'boitePostaleFR',
     'boitePostaleAR',
     'longe',
     'alt',
     'email',
     'orgImgUrl',
     'descriptionorgAR',
     'descriptionorgFR',
     'histoAr',
     'histoFR',
     'logoUrl',
     'isPublished',
     'user_id',

] ;
}
