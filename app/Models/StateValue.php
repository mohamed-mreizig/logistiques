<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StateValue extends Model
{
    protected $fillable = ['title_id', 'state_id', 'value'];
    
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
    
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}