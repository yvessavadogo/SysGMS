<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assure extends Model
{
    use HasFactory;

    protected $table = 'assures';
    protected $primaryKey = 'idAssure';
    protected $fillable = [
        'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
        'telephoneAssure', 'adresseAssure', 'statutAssure', 'photoAssure'
    ];

    public function mutualistes()
    {
        return $this->hasMany(Mutualiste::class, 'idAssure');
    }

    public function personnesACharge()
    {
        return $this->hasMany(PersonneACharge::class, 'idAssure');
    }
}
