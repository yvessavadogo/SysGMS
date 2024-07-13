<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssureApiController extends Controller
{

    public function index()
{
    $assures = DB::table('assures')
        ->leftJoin('mutualistes', 'assures.idAssure', '=', 'mutualistes.idAssure')
        ->leftJoin('personnes_a_charge', 'assures.idAssure', '=', 'personnes_a_charge.idAssure')
        ->select(
            'assures.idAssure',
            'mutualistes.idMutualiste',
            'personnes_a_charge.idPAC',
            'assures.nomAssure',
            'assures.prenomAssure',
            'assures.dateNaissanceAssure',
            'assures.sexeAssure',
            'assures.telephoneAssure',
            'assures.adresseAssure',
            'assures.statutAssure',
            'assures.photoAssure',
            'mutualistes.matriculeMutualiste',
            'mutualistes.categorieMutualiste',
            'mutualistes.serviceMutualiste',
            'mutualistes.fonctionMutualiste',
            'mutualistes.depensesSante',
            'mutualistes.documentMutualiste',
            'personnes_a_charge.idMutualiste',
            'personnes_a_charge.affilliationPAC',
            'personnes_a_charge.documentAffiliationPAC',
            'personnes_a_charge.certificatScolarite'
        )
        ->get();

        $assures->map(function ($assure) {
            if ($assure->photoAssure) {
                $assure->photoAssure = base64_encode($assure->photoAssure);
            }
            return $assure;
        });

    return response()->json($assures, 200, [], JSON_UNESCAPED_UNICODE);

}


    public function show($id)
    {
        $assure = DB::table('assures')
        ->leftJoin('mutualistes', 'assures.idAssure', '=', 'mutualistes.idAssure')
        ->leftJoin('personnes_a_charge', 'assures.idAssure', '=', 'personnes_a_charge.idAssure')
        ->select(
            'assures.idAssure',
            'mutualistes.idMutualiste',
            'personnes_a_charge.idPAC',
            'assures.nomAssure',
            'assures.prenomAssure',
            'assures.dateNaissanceAssure',
            'assures.sexeAssure',
            'assures.telephoneAssure',
            'assures.adresseAssure',
            'assures.statutAssure',
            'assures.photoAssure',
            'mutualistes.matriculeMutualiste',
            'mutualistes.categorieMutualiste',
            'mutualistes.serviceMutualiste',
            'mutualistes.fonctionMutualiste',
            'mutualistes.depensesSante',
            'mutualistes.documentMutualiste',
            'personnes_a_charge.idMutualiste',
            'personnes_a_charge.affilliationPAC',
            'personnes_a_charge.documentAffiliationPAC',
            'personnes_a_charge.certificatScolarite'
        )
        ->where('assures.idAssure', $id)
        ->get();

        $assure->map(function ($assure) {
            if ($assure->photoAssure) {
                $assure->photoAssure = base64_encode($assure->photoAssure);
            }
            return $assure;
        });

        return response()->json($assure);
    }
}
