<?php

namespace App\Http\Controllers\Charges;

use App\Http\Controllers\Controller;
use App\Models\ChargeDerivate;
use App\Models\ElectricCharge;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChargeDerivateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chargeDerivates = ChargeDerivate::all();

        return Inertia::render(
            'Charges/ChargeDerivate/Index',
            [
                'data' => $chargeDerivates,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $electricCharges = ElectricCharge::all();

        return Inertia::render(
            'Charges/ChargeDerivate/Create',
            [
                'electricCharges' => $electricCharges,
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
                'electric_charge_id' => 'required|integer',
                'name_technical' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
            ],
            [
                'electric_charge_id.required' => 'El campo electric_charge_id es obligatorio',
                'electric_charge_id.integer' => 'El campo electric_charge_id debe ser un número entero',
                'name_technical.required' => 'El campo name_technical es obligatorio',
                'name_technical.string' => 'El campo name_technical debe ser una cadena de texto',
                'name_technical.max' => 'El campo name_technical debe tener un máximo de 255 caracteres',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'name.max' => 'El campo name debe tener un máximo de 255 caracteres',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
            ]
        );

        $charge = new ChargeDerivate();
        $charge->electric_charge_id = $request->electric_charge_id;
        $charge->name_technical = $request->name_technical;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->save();

        return redirect()->route('charge.directive.index');
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
        $chargeDerivate = ChargeDerivate::find($id);
        $electricCharges = ElectricCharge::all();

        return Inertia::render(
            'Charges/ChargeDerivate/Edit',
            [
                'data' => $chargeDerivate,
                'electricCharges' => $electricCharges,
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
                'electric_charge_id' => 'required|integer',
                'name_technical' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
            ],
            [
                'electric_charge_id.required' => 'El campo electric_charge_id es obligatorio',
                'electric_charge_id.integer' => 'El campo electric_charge_id debe ser un número entero',
                'name_technical.required' => 'El campo name_technical es obligatorio',
                'name_technical.string' => 'El campo name_technical debe ser una cadena de texto',
                'name_technical.max' => 'El campo name_technical debe tener un máximo de 255 caracteres',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'name.max' => 'El campo name debe tener un máximo de 255 caracteres',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
            ]
        );

        $charge = ChargeDerivate::find($id);
        $charge->electric_charge_id = $request->electric_charge_id;
        $charge->name_technical = $request->name_technical;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->save();

        return redirect()->route('charge.directive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ChargeDerivate::find($id);
        $charge->delete();

        return redirect()->route('charge.directive.index');
    }
}
