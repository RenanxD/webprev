<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cadastro_cidade';
    protected $primaryKey = 'id_cidade';
    protected $connection = 'external_pgsql';

    protected $fillable = ['cidade_descricao', 'id_estado', 'slug', 'cidade_imagem'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($cidade) {
            if (empty($cidade->slug)) {
                $cidade->slug = Str::slug($cidade->cidade_descricao, '-');
            }
        });
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado');
    }
}
