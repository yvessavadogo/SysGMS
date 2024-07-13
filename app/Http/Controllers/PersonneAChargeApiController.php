<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Mutualiste;
use App\Models\PersonneACharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonneAChargeApiController extends Controller
{
    public function index($idMutualiste)
    {

        $personnesACharge = DB::table('personnes_a_charge')
        ->rightJoin('assures', 'personnes_a_charge.idAssure', '=', 'assures.idAssure')
        ->select(
            'assures.idAssure',
            'personnes_a_charge.idPAC',
            'assures.nomAssure',
            'assures.prenomAssure',
            'assures.dateNaissanceAssure',
            'assures.sexeAssure',
            'assures.telephoneAssure',
            'assures.adresseAssure',
            'assures.statutAssure',
            'assures.photoAssure',
            'personnes_a_charge.idMutualiste',
            'personnes_a_charge.Mut_idAssure',
            'personnes_a_charge.affilliationPAC',
            'personnes_a_charge.documentAffiliationPAC',
            'personnes_a_charge.certificatScolarite'
        )
        ->where('personnes_a_charge.idMutualiste', $idMutualiste)
        ->get();

        $personnesACharge->map(function ($personneACharge) {
            if ($personneACharge->photoAssure) {
                $personneACharge->photoAssure = base64_encode($personneACharge->photoAssure);
            }

            $mutualiste = Mutualiste::with('assure')->where('idMutualiste', $personneACharge->idMutualiste)->first();
            $personneACharge->mutualisteAssocie = $mutualiste->assure->nomAssure . ' ' . $mutualiste->assure->prenomAssure;
            return $personneACharge;
        });

    return response()->json($personnesACharge, 200, [], JSON_UNESCAPED_UNICODE);

    }

    public function store(Request $request)
    {
        $assureData = $request->only([
            'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
            'telephoneAssure', 'adresseAssure', 'statutAssure', 'photoAssure'
        ]);

        if ($request->hasFile('photoAssure')) {
            $assureData['photoAssure'] = file_get_contents($request->file('photoAssure')->getRealPath());
        }

        $assure = Assure::create($assureData);

        $personneAChargeData = $request->only([
            'idPAC', 'idMutualiste', 'affilliationPAC',
            'documentAffiliationPAC', 'certificatScolarite'
        ]);
        $personneAChargeData['idAssure'] = $assure->idAssure;
        $mutualiste = Mutualiste::findOrFail($request->idMutualiste);
        $personneAChargeData['Mut_idAssure'] = $mutualiste->idAssure;

        if ($request->hasFile('documentAffiliationPAC')) {
            $personneAChargeData['documentAffiliationPAC'] = file_get_contents($request->file('documentAffiliationPAC')->getRealPath());
        }

        if ($request->hasFile('certificatScolarite')) {
            $personneAChargeData['certificatScolarite'] = file_get_contents($request->file('certificatScolarite')->getRealPath());
        }

        $personneACharge = PersonneACharge::create($personneAChargeData);
        return response()->json($personneACharge, 201);
    }

    public function show($id)
    {
        $personneACharge = DB::table('personnes_a_charge')
        ->rightJoin('assures', 'personnes_a_charge.idAssure', '=', 'assures.idAssure')
        ->select(
            'assures.idAssure',
            'personnes_a_charge.idPAC',
            'assures.nomAssure',
            'assures.prenomAssure',
            'assures.dateNaissanceAssure',
            'assures.sexeAssure',
            'assures.telephoneAssure',
            'assures.adresseAssure',
            'assures.statutAssure',
            'assures.photoAssure',
            'personnes_a_charge.idMutualiste',
            'personnes_a_charge.Mut_idAssure',
            'personnes_a_charge.affilliationPAC',
            'personnes_a_charge.documentAffiliationPAC',
            'personnes_a_charge.certificatScolarite'
        )
        ->where('personnes_a_charge.idPAC', $id)
        ->get();

        $personneACharge->map(function ($personneACharge) {
            if ($personneACharge->photoAssure) {
                $personneACharge->photoAssure = base64_encode($personneACharge->photoAssure);
            }

            $mutualiste = Mutualiste::with('assure')->where('idMutualiste', $personneACharge->idMutualiste)->first();
            $personneACharge->mutualisteAssocie = $mutualiste->assure->nomAssure . ' ' . $mutualiste->assure->prenomAssure;
            return $personneACharge;
        });

    return response()->json($personneACharge, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
    {
        $personneACharge = PersonneACharge::findOrFail($id);
        $assure = Assure::findOrFail($personneACharge->idAssure);

        $assureData = $request->only([
            'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
            'telephoneAssure', 'adresseAssure', 'statutAssure', 'photoAssure'
        ]);

        if ($request->hasFile('photoAssure')) {
            $assureData['photoAssure'] = file_get_contents($request->file('photoAssure')->getRealPath());
        }

        $assure->update($assureData);

        $personneAChargeData = $request->only([
            'Mut_idAssure', 'idMutualiste', 'affilliationPAC',
            'documentAffiliationPAC', 'certificatScolarite'
        ]);
        $personneACharge->update($personneAChargeData);

        return response()->json($personneACharge, 200);
    }

    public function destroy($id)
    {
        $personneACharge = PersonneACharge::findOrFail($id);
        $personneACharge->delete();
        return response()->json(null, 204);
    }
}
