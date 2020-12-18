<?php

namespace App\Http\Controllers;

use App\Eleve;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    {
        $eleves = Eleve::all();

        return view('Eleve.index', compact('eleves'));
    }

    public function create()
    {
        return view('Eleve.create');
    }

    public function store(Request $request)
    {
        Eleve::create($request->all());

        Toastr::success('Elément bien ajouté');

        return redirect()->route('eleve.create');
    }

    public function show($id)
    {
        $eleve = Eleve::findOrFail($id);

        return view('Eleve.show', compact('eleve'));
    }

    public function edit($id)
    {
        $eleve = Eleve::findOrFail($id);

        return view('Eleve.edit', compact('eleve'));
    }

    public function update(Request $request, $id)
    {
        $eleve = Eleve::findOrFail($id);
        $eleve->update($request->all());

        Toastr::success('Elément bien mis à jour');

        return redirect()->route('eleve.index');
    }

    public function destroy()
    {
        $eleveNom = Eleve::findOrFail(request('id'))->nom;
        Eleve::destroy(request('id'));

        return response($eleveNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Eleve::destroy($element);
        }

        return $elements;
    }
}
