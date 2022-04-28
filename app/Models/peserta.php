<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peserta extends Model
{
    protected $table = 'peserta';

    public function team()
    {
        return $this->belongsTo(team::class);
    }
}
