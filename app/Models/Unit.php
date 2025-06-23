<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function showings() {
        return $this->hasMany(Showing::class);
    }
}
