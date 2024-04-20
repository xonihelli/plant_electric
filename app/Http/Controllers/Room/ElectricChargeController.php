<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\ElectricCharge;
use Illuminate\Http\Request;
use App\Models\Room;
use Inertia\Inertia;

class ElectricChargeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = session('room');
        $idRoom = session('idRoom');
        $totalTransformers = session('totalTransformers');
        $totalKw = session('totalKw');
        $totalA = session('totalA');
        $rooms = Room::all();

        return Inertia::render('Rooms/ElectricCharge/Create', [
            'room' => $room,
            'rooms' => $rooms,
            'totalA' => $totalA,
            'idRoom' => $idRoom,
            'totalKw' => $totalKw,
            'totalTransformers' => $totalTransformers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'room_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
                'measurement_date' => 'required|date',
            ],
            [
                'room_id.required' => 'El campo room_id es obligatorio',
                'room_id.integer' => 'El campo room_id debe ser un número entero',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'name.max' => 'El campo name no debe exceder los 255 caracteres',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
                'measurement_date.required' => 'El campo measurement_date es obligatorio',
                'measurement_date.date' => 'El campo measurement_date debe ser una fecha',
            ]
        );

        $charge = new ElectricCharge();
        $charge->room_id = $request->room_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->measurement_date = $request->measurement_date;
        $charge->save();

        return redirect()->route('room.show', ['room' => $request->room_id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $charge = ElectricCharge::with('chargeDerivates')->find($id);
        $totalTablersDistro = $charge->chargeDerivates->count();
        session()->put('tablero', $charge);
        session()->put('totalTablersDistro', $totalTablersDistro);

        $rooms = Room::all();
        $room = session('room');
        $idRoom = session('idRoom');
        $totalTransformers = session('totalTransformers');
        $totalKw = session('totalKw');
        $totalA = session('totalA');

        return Inertia::render('Rooms/ElectricCharge/Edit', [
            'data' => $charge,
            'electric_charge' => $id,
            'room' => $room,
            'rooms' => $rooms,
            'totalA' => $totalA,
            'idRoom' => $idRoom,
            'totalKw' => $totalKw,
            'totalTransformers' => $totalTransformers,
            'totalTablersDistro' => $totalTablersDistro,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'room_id' => 'required|integer',
                'name' => 'required|string|max:255',
                'kw' => 'required|numeric',
                'a' => 'required|numeric',
                'measurement_date' => 'required|date',
            ],
            [
                'room_id.required' => 'El campo room_id es obligatorio',
                'room_id.integer' => 'El campo room_id debe ser un número entero',
                'name.required' => 'El campo name es obligatorio',
                'name.string' => 'El campo name debe ser una cadena de texto',
                'name.max' => 'El campo name no debe exceder los 255 caracteres',
                'kw.required' => 'El campo kw es obligatorio',
                'kw.numeric' => 'El campo kw debe ser un número',
                'a.required' => 'El campo a es obligatorio',
                'a.numeric' => 'El campo a debe ser un número',
                'measurement_date.required' => 'El campo measurement_date es obligatorio',
                'measurement_date.date' => 'El campo measurement_date debe ser una fecha',
            ]
        );

        $charge = ElectricCharge::find($id);
        $charge->room_id = $request->room_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->measurement_date = $request->measurement_date;
        $charge->save();

        return redirect()->route('room.show', ['room' => $request->room_id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ElectricCharge::with('chargeDerivates')->find($id);
        $idRoom = session('idRoom');

        if (!$charge) {
            // Si el transformador no se encuentra, redirige con un mensaje de error.
            return redirect()->route('room.index')->with('error', 'El transformador no fue encontrado.');
        }

        if ($charge->chargeDerivates->isNotEmpty()) {
            // Si el transformador tiene tableros de distribución asociados, no permitir eliminarlo.
            return redirect()->route('room.index')->with('error', 'No se puede eliminar el transformador porque tiene tableros de distribución asociados.');
        }

        // Si no hay tableros asociados, proceder a eliminar el transformador.
        $charge->delete();

        return redirect()->route('room.show', ['room' => $idRoom])->with('success', 'Transformador eliminado exitosamente.');
    }

}
