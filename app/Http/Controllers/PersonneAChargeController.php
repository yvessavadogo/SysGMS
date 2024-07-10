<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Mutualiste;
use App\Models\PersonneACharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PersonneAChargeController extends Controller
{
    public function index($idMutualiste, $idAssure)
    {
        $Mut_idAssure = $idAssure;
        $idMutualiste = $idMutualiste;
        $personnesACharge = PersonneACharge::with('assure', 'mutualiste')->where('idMutualiste', $idMutualiste)->where('Mut_idAssure', $Mut_idAssure)->get();
        $mutualiste = Mutualiste::with('assure')->where('idMutualiste', $idMutualiste)->where('idAssure', $Mut_idAssure)->first();
        return view('personnes_a_charge.index', compact('personnesACharge', 'mutualiste', 'Mut_idAssure','idMutualiste'));
    }

    public function create($idMutualiste, $idAssure)
    {
        $Mut_idAssure = $idAssure;
        return view('personnes_a_charge.create', compact('Mut_idAssure','idMutualiste'));
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
            'idPAC', 'Mut_idAssure', 'idMutualiste', 'affilliationPAC',
            'documentAffiliationPAC', 'certificatScolarite'
        ]);

        $personneAChargeData['idAssure'] = $assure->idAssure;

        if ($request->hasFile('documentAffiliationPAC')) {
            $assureData['documentAffiliationPAC'] = file_get_contents($request->file('documentAffiliationPAC')->getRealPath());
        }

        if ($request->hasFile('certificatScolarite')) {
            $assureData['certificatScolarite'] = file_get_contents($request->file('certificatScolarite')->getRealPath());
        }


        PersonneACharge::create($personneAChargeData);

        return redirect()->route('personnes_a_charge.index', ['idMutualiste' => $request->idMutualiste, 'idAssure' => $request->Mut_idAssure])->with('success', 'Personne à charge créée avec succès');
    }

    public function show($id)
    {
        $personneACharge = PersonneACharge::with('assure', 'mutualiste')->findOrFail($id);
        return view('personnes_a_charge.show', compact('personneACharge'));
    }

    public function edit($id)
    {
        $personneACharge = PersonneACharge::with('assure', 'mutualiste')->findOrFail($id);
        return view('personnes_a_charge.edit', compact('personneACharge'));
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

        return redirect()->route('personnes_a_charge.index', ['idMutualiste' => $request->idMutualiste, 'idAssure' => $request->Mut_idAssure])->with('success', 'Personne à charge mise à jour avec succès');
    }

    public function destroy($id)
    {
        $personneACharge = PersonneACharge::findOrFail($id);
        $personneACharge->delete();

        return redirect()->route('personnes_a_charge.index')->with('success', 'Personne à charge supprimée avec succès');
    }
}
