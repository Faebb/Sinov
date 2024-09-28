<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afiliado extends Model
{
    use HasFactory;
    protected $filable = ['name', 'email', 'cliente_id'];

    public function clientes()
    {
        return $this->belongsTo(Cliente::class);
    }
}
