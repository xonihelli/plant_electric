<?php

namespace App\Http\Controllers\Charges;

use App\Http\Controllers\Controller;
use App\Models\ChargeSubDerivate;
use App\Models\ChargeDerivate;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChargeSubDerivateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chargeSubDerivates = ChargeSubDerivate::all();

        return Inertia::render(
            'Charges/ChargeSubDerivate/Index',
            [
                'data' => $chargeSubDerivates,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chargeDerivates = ChargeDerivate::all();

        return Inertia::render(
            'Charges/ChargeSubDerivate/Create',
            [
                'chargeDerivates' => $chargeDerivates,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'charge_derivate_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'capacity' => 'required|numeric',
                'location' => 'required|string|max:255',
                'lightning_discharge' => 'required|numeric',
                'surge' => 'required|numeric',
            ],
            [
                'charge_derivate_id.required' => 'El campo charge_derivate_id es obligatorio',
                'charge_derivate_id.integer' => 'El campo charge_derivate_id debe ser un número entero',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
                'brand.required' => 'El campo brand es obligatorio',
                'brand.string' => 'El campo brand debe ser una cadena de texto',
                'model.required' => 'El campo model es obligatorio',
                'model.string' => 'El campo model debe ser una cadena de texto',
                'capacity.required' => 'El campo capacity es obligatorio',
                'capacity.numeric' => 'El campo capacity debe ser un número',
                'location.required' => 'El campo location es obligatorio',
                'location.string' => 'El campo location debe ser una cadena de texto',
                'lightning_discharge.required' => 'El campo lightning_discharge es obligatorio',
                'lightning_discharge.numeric' => 'El campo lightning_discharge debe ser un número',
                'surge.required' => 'El campo surge es obligatorio',
                'surge.numeric' => 'El campo surge debe ser un número',
            ]
        );

        $charge = new ChargeSubDerivate();
        $charge->charge_derivate_id = $request->charge_derivate_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->brand = $request->brand;
        $charge->model = $request->model;
        $charge->capacity = $request->capacity;
        $charge->location = $request->location;
        $charge->lightning_discharge = $request->lightning_discharge;
        $charge->surge = $request->surge;
        $charge->save();

        return redirect()->route('charge.sub-directive.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chargeSubDerivate = ChargeSubDerivate::find($id);
        $chargeDerivates = ChargeDerivate::all();

        return Inertia::render(
            'Charges/ChargeSubDerivate/Edit',
            [
                'data' => $chargeSubDerivate,
                'chargeDerivates' => $chargeDerivates,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'charge_derivate_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
                'brand' => 'required|string|max:255',
                'model' => 'required|string|max:255',
                'capacity' => 'required|numeric',
                'location' => 'required|string|max:255',
                'lightning_discharge' => 'required|numeric',
                'surge' => 'required|numeric',
            ],
            [
                'charge_derivate_id.required' => 'El campo charge_derivate_id es obligatorio',
                'charge_derivate_id.integer' => 'El campo charge_derivate_id debe ser un número entero',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
                'brand.required' => 'El campo brand es obligatorio',
                'brand.string' => 'El campo brand debe ser una cadena de texto',
                'model.required' => 'El campo model es obligatorio',
                'model.string' => 'El campo model debe ser una cadena de texto',
                'capacity.required' => 'El campo capacity es obligatorio',
                'capacity.numeric' => 'El campo capacity debe ser un número',
                'location.required' => 'El campo location es obligatorio',
                'location.string' => 'El campo location debe ser una cadena de texto',
                'lightning_discharge.required' => 'El campo lightning_discharge es obligatorio',
                'lightning_discharge.numeric' => 'El campo lightning_discharge debe ser un número',
                'surge.required' => 'El campo surge es obligatorio',
                'surge.numeric' => 'El campo surge debe ser un número',
            ]
        );

        $charge = ChargeSubDerivate::find($id);
        $charge->charge_derivate_id = $request->charge_derivate_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->brand = $request->brand;
        $charge->model = $request->model;
        $charge->capacity = $request->capacity;
        $charge->location = $request->location;
        $charge->lightning_discharge = $request->lightning_discharge;
        $charge->surge = $request->surge;
        $charge->save();

        return redirect()->route('charge.sub-directive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ChargeSubDerivate::find($id);
        $charge->delete();

        return redirect()->route('charge.sub-directive.index');
    }
}
