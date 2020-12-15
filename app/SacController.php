<?php

namespace App\Http\Controllers;

use App\Sac;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SacController extends Controller
{
    public function index()
    {
        $sacs = Sac::all();

        return view('Sac.index', compact('sacs'));
    }

    public function create()
    {
        return view('Sac.create');
    }

    public function store(Request $request)
    {
        Sac::create($request->all());

        Toastr::success('Elément bien ajouté');

        return redirect()->route('sac.create');
    }

    public function show($id)
    {
        $sac = Sac::findOrFail($id);

        return view('Sac.show', compact('sac'));
    }

    public function edit($id)
    {
        $sac = Sac::findOrFail($id);

        return view('Sac.edit', compact('sac'));
    }

    public function update(Request $request, $id)
    {
        $sac = Sac::findOrFail($id);
        $sac->update($request->all());

        Toastr::success('Elément bien mis à jour');

        return redirect()->route('sac.index');
    }

    public function destroy()
    {
        $sacNom = Sac::findOrFail(request('id'))->nom;
        Sac::destroy(request('id'));

        return response($sacNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Sac::destroy($element);
        }

        return $elements;
    }
}
