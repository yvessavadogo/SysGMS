<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\PersonneACharge;
use Illuminate\Http\Request;

class PersonneAChargeController extends Controller
{
    public function index()
    {
        $personnesACharge = PersonneACharge::with('assure', 'mutualiste')->get();
        return view('personnes_a_charge.index', compact('personnesACharge'));
    }

    public function create()
    {
        return view('personnes_a_charge.create');
    }

    public function store(Request $request)
    {
        $assureData = $request->only([
            'nomAssure', 'prenomAssure', 'dateNaissanceAssure', 'sexeAssure',
            'telephoneAssure', 'adresseAssure', 'statutAssure', 'photoAssure'
        ]);

        $assure = Assure::create($assureData);

        $personneAChargeData = $request->only([
            'idPAC', 'Mut_idAssure', 'idMutualiste', 'affilliationPAC',
            'documentAffiliationPAC', 'certificatScolarite'
        ]);
        $personneAChargeData['idAssure'] = $assure->idAssure;

        PersonneACharge::create($personneAChargeData);

        return redirect()->route('personnes_a_charge.index')->with('success', 'Personne à charge créée avec succès');
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
        $assure->update($assureData);

        $personneAChargeData = $request->only([
            'Mut_idAssure', 'idMutualiste', 'affilliationPAC',
            'documentAffiliationPAC', 'certificatScolarite'
        ]);
        $personneACharge->update($personneAChargeData);

        return redirect()->route('personnes_a_charge.index')->with('success', 'Personne à charge mise à jour avec succès');
    }

    public function destroy($id)
    {
        $personneACharge = PersonneACharge::findOrFail($id);
        $personneACharge->delete();

        return redirect()->route('personnes_a_charge.index')->with('success', 'Personne à charge supprimée avec succès');
    }
}
