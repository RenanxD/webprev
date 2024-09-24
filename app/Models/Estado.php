<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'cadastro_estado';
    protected $primaryKey = 'id_estado';
    protected $connection = 'external_pgsql';

    public function cidades()
    {
        return $this->hasMany(Cidade::class, 'id_estado');
    }
}
