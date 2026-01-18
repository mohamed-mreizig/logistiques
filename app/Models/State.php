<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name'];
    
    public function stateValues()
    {
        return $this->hasMany(StateValue::class);
    }
}