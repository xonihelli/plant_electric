<?php

namespace App\Http\Controllers\Charges;

use App\Http\Controllers\Controller;
use App\Models\ChargeDerivate;
use App\Models\ElectricCharge;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class ChargeDerivateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chargeDerivates = ChargeDerivate::with('electricCharge')->get();

        session()->put([
            'transformadores' => $chargeDerivates,
        ]);

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
        $room = session('room');
        $idRoom = session('idRoom');
        $transformadores = session('transformadores');
        $totalTransformers = session('totalTransformers');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);
        $totalKw = session('totalKw');
        $totalA = session('totalA');
        $idDirective = session('tablero')->id;
        $transoformador = session('tablero');

        return Inertia::render(
            'Charges/ChargeDerivate/Create',
            [
                'electricCharges' => $electricCharges,
                'totalTablersDistro' => $totalTablersDistro,
                'totalTransformers' => $totalTransformers,
                'room' => $room,
                'idRoom' => $idRoom,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'idDirective' => $idDirective,
                'transoformador' => $transoformador,
                'transformadores' => $transformadores,
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
                'surge' => 'numeric',
                'voltage' => 'numeric',
                'lightning_discharge' => 'numeric',
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
                'surge.numeric' => 'El campo surge debe ser un número decimal',
                'voltage.numeric' => 'El campo voltage debe ser un número decimal',
                'lightning_discharge.numeric' => 'El campo lightning_discharge debe ser un número decimal',
            ]
        );

        $charge = new ChargeDerivate();
        $charge->electric_charge_id = $request->electric_charge_id;
        $charge->name_technical = $request->name_technical;
        $charge->name = $request->name;
        $charge->surge = $request->surge;
        $charge->voltage = $request->voltage;
        $charge->lightning_discharge = $request->lightning_discharge;
        $charge->save();

        return redirect()->route('directive.show', ['directive' => $request->electric_charge_id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $charge = ChargeDerivate::findOrFail($id);
        $charge = ChargeDerivate::with('electricCharge')
                    ->where('electric_charge_id', $id)
                    ->get();

        $tableres = ElectricCharge::find($id);
        session()->put('tablero', $tableres);

        $tablero = session()->get('tablero');
        $room = session('room');
        $idRoom = session('idRoom');
        $totalA = session('totalA');
        $totalKw = session('totalKw');
        $totalTransformers = session('totalTransformers');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);


        return Inertia::render(
            'Charges/ChargeDerivate/Show',
            [
                'data' => $tablero,
                'charge' => $charge,
                'room' => $room,
                'idRoom' => $idRoom,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'totalTransformers' => $totalTransformers,
                'totalTablersDistro' => $totalTablersDistro,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chargeDerivate = ChargeDerivate::find($id);
        $electricCharges = ElectricCharge::all();

        $room = session('room');
        $idRoom = session('idRoom');
        $totalTransformers = session('totalTransformers');
        $totalTablersDistro = session()->get('totalTablersDistro', 0);
        $totalKw = session('totalKw');
        $totalA = session('totalA');
        $idDirective = session('tablero')->id;
        $transoformador = session('tablero');

        return Inertia::render(
            'Charges/ChargeDerivate/Edit',
            [
                'data' => $chargeDerivate,
                'electricCharges' => $electricCharges,

                'totalTablersDistro' => $totalTablersDistro,
                'totalTransformers' => $totalTransformers,
                'room' => $room,
                'idRoom' => $idRoom,
                'totalA' => $totalA,
                'totalKw' => $totalKw,
                'idDirective' => $idDirective,
                'transoformador' => $transoformador,
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
                'surge' => 'numeric',
                'voltage' => 'numeric',
                'lightning_discharge' => 'numeric',
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
                'surge.numeric' => 'El campo surge debe ser un número decimal',
                'voltage.numeric' => 'El campo voltage debe ser un número decimal',
                'lightning_discharge.numeric' => 'El campo lightning_discharge debe ser un número decimal',
            ]
        );

        $charge = ChargeDerivate::find($id);
        $charge->electric_charge_id = $request->electric_charge_id;
        $charge->name_technical = $request->name_technical;
        $charge->name = $request->name;
        $charge->surge = $request->surge;
        $charge->voltage = $request->voltage;
        $charge->lightning_discharge = $request->lightning_discharge;
        $charge->save();

        return redirect()->route('directive.show', ['directive' => $request->electric_charge_id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ChargeDerivate::find($id);
        $charge->delete();

        return redirect()->route('directive.show', ['directive' => $charge->electric_charge_id]);
    }
}
