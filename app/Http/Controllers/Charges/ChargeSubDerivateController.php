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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chargeDerivates = ChargeDerivate::all();

        $room = session()->get('room');
        $idDirective = session()->get('idDirective');
        $totalA = session()->get('totalA');
        $totalKw = session()->get('totalKw');
        $totalTransformers = session()->get('totalTransformers');
        $tablero = session()->get('tablero');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);
        $idRoom = session('idRoom');



        return Inertia::render(
            'Charges/ChargeSubDerivate/Create',
            [
                'chargeDerivates' => $chargeDerivates,
                'room' => $room,
                'idRoom' => $idRoom,
                'idDirective' => $idDirective,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'totalTransformers' => $totalTransformers,
                'totalTablersDistro' => $totalTablersDistro,
                'data' => $tablero,
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
        $charge->save();

        return redirect()->route('sub-directive.show', ['sub_directive' => $request->charge_derivate_id]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $chargeSubDerivates = ChargeDerivate::with(['electricCharge', 'chargeSubDerivate'])
        //     ->where('id', $id)
        //     ->get();

        $chargeSubDerivates = ChargeSubDerivate::where('charge_derivate_id', $id)->get();

        $room = session()->get('room');
        $idDirective = session()->get('idDirective');
        $totalA = session()->get('totalA');
        $totalKw = session()->get('totalKw');
        $totalTransformers = session()->get('totalTransformers');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);
        $tablero = session()->get('tablero');


        return Inertia::render(
            'Charges/ChargeSubDerivate/Show',
            [
                'data' => $chargeSubDerivates,
                'room' => $room,
                'idDirective' => $idDirective,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'totalTransformers' => $totalTransformers,
                'totalTablersDistro' => $totalTablersDistro,
                'tablero' => $tablero,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chargeSubDerivate = ChargeSubDerivate::find($id);
        $chargeDerivates = ChargeDerivate::all();

        $room = session()->get('room');
        $idDirective = session()->get('idDirective');
        $totalA = session()->get('totalA');
        $totalKw = session()->get('totalKw');
        $totalTransformers = session()->get('totalTransformers');
        $tablero = session()->get('tablero');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);
        $idRoom = session('idRoom');

        return Inertia::render(
            'Charges/ChargeSubDerivate/Edit',
            [
                'data' => $chargeSubDerivate,
                'chargeDerivates' => $chargeDerivates,
                'room' => $room,
                'idRoom' => $idRoom,
                'idDirective' => $idDirective,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'totalTransformers' => $totalTransformers,
                'totalTablersDistro' => $totalTablersDistro,
                'tablero' => $tablero,
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
        $charge->save();

        return redirect()->route('sub-directive.show', ['sub_directive' => $request->charge_derivate_id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ChargeSubDerivate::find($id);
        $charge->delete();

        return redirect()->route('sub-directive.show', ['sub_directive' => $charge->charge_derivate_id]);
    }
}
