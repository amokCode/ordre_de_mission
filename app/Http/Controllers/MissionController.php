<?php

namespace App\Http\Controllers;

use App\Mission;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    public function index()
    {
        $missions = Mission::all();

        return view('Mission.index', compact('missions'));
    }

    public function create()
    {
        return view('Mission.create');
    }

    public function store(Request $request)
    {
        Mission::create($request->all());

        Toastr::success('Elément bien ajouté');

        return redirect()->route('mission.create');
    }

    public function show($id)
    {
        $mission = Mission::findOrFail($id);

        return view('Mission.show', compact('mission'));
    }

    public function edit($id)
    {
        $mission = Mission::findOrFail($id);

        return view('Mission.edit', compact('mission'));
    }

    public function update(Request $request, $id)
    {
        $mission = Mission::findOrFail($id);
        $mission->update($request->all());

        Toastr::success('Elément bien mis à jour');

        return redirect()->route('mission.index');
    }

    public function destroy()
    {
        $missionNom = Mission::findOrFail(request('id'))->nom;
        Mission::destroy(request('id'));

        return response($missionNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Mission::destroy($element);
        }

        return $elements;
    }
}
