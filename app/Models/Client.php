<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Client extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'clients';
    protected $fillable = [
        'nomComplet',
        'email',
        'telephone',
        'dateNaissance',
        'genre',
        'adresse',
        'cni',
        'password',
    ];

    public function comptes()
    {
        return $this->hasMany(Compte::class);
    }
}
