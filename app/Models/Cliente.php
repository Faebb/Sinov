<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function mienbros()
    {
    return $this->belongsToMany(User::class, 'cliente_user', 'cliente_id', 'user_id');    
    }
    public function afiliados(){
        return $this->hasMany(Afiliado::class);
    }
}
