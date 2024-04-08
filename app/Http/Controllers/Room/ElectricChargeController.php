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

        $rooms = Room::all();

        return Inertia::render('Rooms/ElectricCharge/Create', [
            'rooms' => $rooms,
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
                'total_kw' => 'required|numeric',
                'total_a' => 'required|numeric',
                'fu_general' => 'required|numeric',
                'fu_kw' => 'required|numeric',
                'fu_a' => 'required|numeric',
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
                'total_kw.required' => 'El campo total_kw es obligatorio',
                'total_kw.numeric' => 'El campo total_kw debe ser un número',
                'total_a.required' => 'El campo total_a es obligatorio',
                'total_a.numeric' => 'El campo total_a debe ser un número',
                'fu_general.required' => 'El campo fu_general es obligatorio',
                'fu_general.numeric' => 'El campo fu_general debe ser un número',
                'fu_kw.required' => 'El campo fu_kw es obligatorio',
                'fu_kw.numeric' => 'El campo fu_kw debe ser un número',
                'fu_a.required' => 'El campo fu_a es obligatorio',
                'fu_a.numeric' => 'El campo fu_a debe ser un número',
                'measurement_date.required' => 'El campo measurement_date es obligatorio',
                'measurement_date.date' => 'El campo measurement_date debe ser una fecha',
            ]
        );

        $charge = new ElectricCharge();
        $charge->room_id = $request->room_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->total_kw = $request->total_kw;
        $charge->total_a = $request->total_a;
        $charge->fu_general = $request->fu_general;
        $charge->fu_kw = $request->fu_kw;
        $charge->fu_a = $request->fu_a;
        $charge->measurement_date = $request->measurement_date;
        $charge->save();

        return redirect()->route('rooms.room.index');
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
        $charge = ElectricCharge::find($id);
        $rooms = Room::all();
        return Inertia::render('Rooms/ElectricCharge/Edit', [
            'data' => $charge,
            'rooms' => $rooms,
            'electric_charge' => $id,
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
                'total_kw' => 'required|numeric',
                'total_a' => 'required|numeric',
                'fu_general' => 'required|numeric',
                'fu_kw' => 'required|numeric',
                'fu_a' => 'required|numeric',
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
                'total_kw.required' => 'El campo total_kw es obligatorio',
                'total_kw.numeric' => 'El campo total_kw debe ser un número',
                'total_a.required' => 'El campo total_a es obligatorio',
                'total_a.numeric' => 'El campo total_a debe ser un número',
                'fu_general.required' => 'El campo fu_general es obligatorio',
                'fu_general.numeric' => 'El campo fu_general debe ser un número',
                'fu_kw.required' => 'El campo fu_kw es obligatorio',
                'fu_kw.numeric' => 'El campo fu_kw debe ser un número',
                'fu_a.required' => 'El campo fu_a es obligatorio',
                'fu_a.numeric' => 'El campo fu_a debe ser un número',
                'measurement_date.required' => 'El campo measurement_date es obligatorio',
                'measurement_date.date' => 'El campo measurement_date debe ser una fecha',
            ]
        );

        $charge = ElectricCharge::find($id);
        $charge->room_id = $request->room_id;
        $charge->name = $request->name;
        $charge->kw = $request->kw;
        $charge->a = $request->a;
        $charge->total_kw = $request->total_kw;
        $charge->total_a = $request->total_a;
        $charge->fu_general = $request->fu_general;
        $charge->fu_kw = $request->fu_kw;
        $charge->fu_a = $request->fu_a;
        $charge->measurement_date = $request->measurement_date;
        $charge->save();

        return redirect()->route('rooms.room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $charge = ElectricCharge::find($id);
        $charge->delete();

        return redirect()->route('rooms.room.index');
    }
}
