<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonneACharge extends Model
{
    use HasFactory;

    protected $table = 'personnes_a_charge';
    protected $primaryKey = 'idPAC';

    protected $fillable = [
        'idAssure', 'idPAC', 'Mut_idAssure', 'idMutualiste', 'affilliationPAC',
        'documentAffiliationPAC', 'certificatScolarite'
    ];

    public function assure()
    {
        return $this->belongsTo(Assure::class, 'idAssure');
    }

    public function mutualiste()
    {
        return $this->belongsTo(Mutualiste::class, 'idMutualiste');
    }
}
