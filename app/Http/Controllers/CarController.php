<?php

namespace App\Http\Controllers;

use App\Car;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('Car.index', compact('cars'));
    }

    public function create()
    {
        return view('Car.create');
    }

    public function store(Request $request)
    {
        Car::create($request->all());

        Toastr::success('Elément bien ajouté');

        return redirect()->route('car.create');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);

        return view('Car.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('Car.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());

        Toastr::success('Elément bien mis à jour');

        return redirect()->route('car.index');
    }

    public function destroy()
    {
        $carNom = Car::findOrFail(request('id'))->nom;
        Car::destroy(request('id'));

        return response($carNom);
    }

    public function destroyAll()
    {
        $elements = request('ids');

        foreach ($elements as $element) {
            Car::destroy($element);
        }

        return $elements;
    }
}
