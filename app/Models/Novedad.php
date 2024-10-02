<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;

    protected $table = 'novedades';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'direccion',
        'longitud',
        'latitud',
        'cliente_id',
        'afiliado_id',
        'tpnovedades_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function afiliado()
    {
        return $this->belongsTo(Afiliado::class);
    }
    public function tipoNovedad()
    {
        return $this->belongsTo(TipoNovedad::class);
    }
}
