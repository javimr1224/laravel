<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Categoria extends Model
{
    use HasFactory;

    public function productos(){
        return $this->hasMany(Producto::class, 'id');
    }
}
