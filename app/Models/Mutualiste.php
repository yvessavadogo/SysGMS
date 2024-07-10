<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutualiste extends Model
{
    use HasFactory;

    protected $table = 'mutualistes';
    protected $primaryKey = 'idMutualiste';

    protected $fillable = [
        'idAssure', 'idMutualiste', 'matriculeMutualiste', 'categorieMutualiste',
        'serviceMutualiste', 'fonctionMutualiste', 'depensesSante', 'documentMutualiste'
    ];

    public function assure()
    {
        return $this->belongsTo(Assure::class, 'idAssure');
    }

    public function personnesACharge()
    {
        return $this->hasMany(PersonneACharge::class, 'idMutualiste');
    }
}
