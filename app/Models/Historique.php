<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Historique extends Model
{
    //
    use HasFactory;
protected $fillable = [
    'deleted_at',
     'histoAr',
     'histoFR',
     'logoUrl',
     'isPublished',
     'user_id',
     'created_at',
     'updated_at'

] ;
}
