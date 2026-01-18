<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable = ['category_id', 'name'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function stateValues()
    {
        return $this->hasMany(StateValue::class);
    }
}
