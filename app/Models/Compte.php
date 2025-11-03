<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Compte extends Model
{
    use HasFactory, HasUuid;

    protected $table = 'comptes';
    protected $fillable = [
        'client_id',
        'solde_initial',
        'numero_compte',
        'statut',
        'type',
        'devise',
        'motif_blocage'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }


    public static function boot()
    {
        parent::boot();

        static::creating(function ($compte) {
            if (empty($compte->numero_compte)) {
                $compte->numero_compte = self::generateNumeroCompte();
            }
        });
    }
    private static function generateNumeroCompte()
    {
        $prefix = 'BNK_SN';
        $annee = now()->format('Y');
        $randomNumber = str_pad(random_int(0, 99999999), 6, '0', STR_PAD_LEFT);

        return $prefix . $annee . $randomNumber;
    
    }
}
