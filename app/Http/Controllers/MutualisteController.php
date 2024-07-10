<?php

namespace App\Http\Controllers;

use App\Models\Assure;
use App\Models\Mutualiste;
use Illuminate\Http\Request;

class MutualisteController extends Controller
{
    public function index()
    {
        $mutualistes = Mutualiste::withCount('personnesACharge')->get();
        return view('mutualistes.index', compact('mutualistes'));
    }

    public function create()
    {
        return view('mutualistes.create');
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
            $assureData['documentMutualiste'] = file_get_contents($request->file('documentMutualiste')->getRealPath());
        }

        Mutualiste::create($mutualisteData);

        return redirect()->route('mutualistes.index')->with('success', 'Mutualiste créé avec succès');
    }

    public function show($id)
    {
        $mutualiste = Mutualiste::withCount('PersonnesACharge')->where('idMutualiste', $id)->first();
        return view('mutualistes.show', compact('mutualiste'));
    }

    public function edit($id)
    {
        $mutualiste = Mutualiste::with('assure')->where('idMutualiste', $id)->first();
        return view('mutualistes.edit', compact('mutualiste'));
    }

    public function update(Request $request, $id)
    {
        $mutualiste = Mutualiste::where('idMutualiste', $id)->first();
        $assure = Assure::where('idAssure', $mutualiste->idAssure);

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
            $assureData['documentMutualiste'] = file_get_contents($request->file('documentMutualiste')->getRealPath());
        }

        $mutualiste->update($mutualisteData);

        return redirect()->route('mutualistes.index')->with('success', 'Mutualiste mis à jour avec succès');
    }

    public function destroy($id)
    {
        $mutualiste = Mutualiste::findOrFail($id);
        $mutualiste->delete();

        return redirect()->route('mutualistes.index')->with('success', 'Mutualiste supprimé avec succès');
    }
}
