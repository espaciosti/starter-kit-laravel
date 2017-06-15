<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = [
        'perfil',
    ];

     public function usuarios()
    {
        return $this->hasMany(User::class);
    }

}
