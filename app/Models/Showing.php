<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showing extends Model
{
    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function user() {
        return $this->belongsTo(Showing::class);
    }
}
