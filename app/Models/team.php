<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    protected $table = 'team';

    public function peserta()
    {
        return $this->hasMany(peserta::class);
    }
}
