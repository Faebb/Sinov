<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoNovedad extends Model
{
    use HasFactory;

    protected $table = 'tipo_novedades';

    protected $fillable = [
        'titulo',
        'descripcion',
        'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function novedades() {
        return $this->HasMany(Novedad::class);
    }
}
