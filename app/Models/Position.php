<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function positions()
    {
        return $this->hasMany(Position::class, 'position_id', 'id');
    }
}
