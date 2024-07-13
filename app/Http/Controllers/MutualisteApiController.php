<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Mutualiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutualisteApiController extends Controller
{
    public function index()
    {
        $mutualistes = DB::table('mutualistes')
            ->rightJoin('assures', 'mutualistes.idAssure', '=', 'assures.idAssure')
            ->leftJoin('personnes_a_charge', 'mutualistes.idMutualiste', '=', 'personnes_a_charge.idMutualiste')  // Jointure avec personnes_a_charge
            ->select(
                'assures.idAssure',
                'mutualistes.idMutualiste',
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
                DB::raw('COUNT(personnes_a_charge.idPAC) AS personnes_a_charge')  // Compte le nombre de personnes à charge
            )
            ->groupBy(
                'assures.idAssure',
                'mutualistes.idMutualiste',
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
                'mutualistes.documentMutualiste'
            )
            ->get();


        $mutualistes->map(function ($mutualiste) {
            if ($mutualiste->photoAssure) {
                $mutualiste->photoAssure = base64_encode($mutualiste->photoAssure);
            }
            return $mutualiste;
        });

        return response()->json($mutualistes, 200, [], JSON_UNESCAPED_UNICODE);
    }


    public function store(Request $request)
    {
        $assureData = $request->only([
            'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
            'telephoneAssure', 'adresseAssure', 'statutAssure'
        ]);

        if ($request->hasFile('photoAssure')) {
            $assureData['photoAssure'] = file_get_contents($request->file('photoAssure')->getRealPath());
        }

        $assure = Assure::create($assureData);

        $mutualisteData = $request->only([
            'idMutualiste', 'matriculeMutualiste', 'categorieMutualiste',
            'serviceMutualiste', 'fonctionMutualiste', 'depensesSante', 'documentMutualiste'
        ]);
        $mutualisteData['idAssure'] = $assure->idAssure;

        if ($request->hasFile('documentMutualiste')) {
            $mutualisteData['documentMutualiste'] = file_get_contents($request->file('documentMutualiste')->getRealPath());
        }

        $mutualiste = Mutualiste::create($mutualisteData);
        return response()->json($mutualiste, 201);
    }

    public function show($id)
    {
        $mutualiste = DB::table('mutualistes')
            ->rightJoin('assures', 'mutualistes.idAssure', '=', 'assures.idAssure')
            ->leftJoin('personnes_a_charge', 'mutualistes.idMutualiste', '=', 'personnes_a_charge.idMutualiste')  // Jointure avec personnes_a_charge
            ->select(
                'assures.idAssure',
                'mutualistes.idMutualiste',
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
                DB::raw('COUNT(personnes_a_charge.idPAC) AS personnes_a_charge')  // Compte le nombre de personnes à charge
            )
            ->where('mutualistes.idMutualiste', $id)
            ->groupBy(
                'assures.idAssure',
                'mutualistes.idMutualiste',
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
                'mutualistes.documentMutualiste'
            )
            ->get();

        $mutualiste->map(function ($mutualiste) {
            if ($mutualiste->photoAssure) {
                $mutualiste->photoAssure = base64_encode($mutualiste->photoAssure);
            }
            return $mutualiste;
        });

        return response()->json($mutualiste, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(Request $request, $id)
    {
        $mutualiste = Mutualiste::where('idMutualiste', $id)->firstOrFail();
        $assure = Assure::where('idAssure', $mutualiste->idAssure)->firstOrFail();

        $assureData = $request->only([
            'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
            'telephoneAssure', 'adresseAssure', 'statutAssure'
        ]);

        if ($request->hasFile('photoAssure')) {
            $assureData['photoAssure'] = file_get_contents($request->file('photoAssure')->getRealPath());
        }

        $assure->update($assureData);

        $mutualisteData = $request->only([
            'matriculeMutualiste', 'categorieMutualiste',
            'serviceMutualiste', 'fonctionMutualiste', 'depensesSante', 'documentMutualiste'
        ]);

        if ($request->hasFile('documentMutualiste')) {
            $mutualisteData['documentMutualiste'] = file_get_contents($request->file('documentMutualiste')->getRealPath());
        }

        $mutualiste->update($mutualisteData);

        return response()->json($mutualiste, 200);
    }

    public function destroy($id)
    {
        $mutualiste = Mutualiste::findOrFail($id);
        $mutualiste->delete();
        return response()->json(null, 204);
    }
}
