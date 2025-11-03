<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Transaction extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'transactions';
    protected $fillable = [
        'compte_id',
        'typeTransaction',
        'montant',
        'statut',
    ];

    public function compte(){
        return $this->belongsTo(Compte::class);
    }
}
