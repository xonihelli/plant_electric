<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Models\ChargeDerivate;
use Illuminate\Http\Request;
use App\Models\Room;
use Inertia\Inertia;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargamos los cuartos y con ellos, los transformadores y las demás relaciones anidadas
        $rooms = Room::with(['electricCharges.chargeDerivates.chargeSubDerivate'])->get();

        // Calculamos los totales necesarios
        $rooms = $rooms->map(function ($room) {
            // Contar directamente los transformadores (ElectricCharge)
            $room->total_transformers = $room->electricCharges->count();


            // Nuevo: Contar los tableros de distribución (ChargeDerivate)
            $room->total_distribution_boards = $room->electricCharges->reduce(function ($carry, $charge) {
                return $carry + $charge->chargeDerivates->count();
            }, 0);

            // Contar todas las cargas eléctricas (ChargeSubDerivate) relacionadas a través de ChargeDerivates
            $room->total_electric_loads = $room->electricCharges->reduce(function ($carry, $charge) {
                return $carry + $charge->chargeDerivates->reduce(function ($carry, $derivate) {

                    return $carry + $derivate->chargeSubDerivate->count();
                }, 0);
            }, 0);

            return $room;
        });

        return Inertia::render('Rooms/Room/Index', [
            'data' => $rooms,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Rooms/Room/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'name.required' => 'El campo nombre es requerido.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ], $message);

        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;
        $room->save();

        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::with(['electricCharges.chargeDerivates'])->findOrFail($id);

        // Calcula el total de transformadores
        $totalTransformers = $room->electricCharges->count();

        // Calcula el total de KW y A sumando los valores de todos los tableros de distribución de cada transformador
        $totalKw = 0;
        $totalA = 0;

        foreach ($room->electricCharges as $charge) {
            foreach ($charge->chargeDerivates as $derivate) {
                $totalKw += $derivate->kw;
                $totalA += $derivate->a;
            }
        }

        // Agrega las propiedades de totales a cada transformador individual
        $room->electricCharges->transform(function ($charge) {
            $totalKwTransformador = 0;
            $totalATransformador = 0;
            foreach ($charge->chargeDerivates as $derivate) {
                $totalKwTransformador += $derivate->kw;
                $totalATransformador += $derivate->a;
            }
            // Agrega los totales individuales al transformador
            $charge->totalKwTransformador = $totalKwTransformador;
            $charge->totalATransformador = $totalATransformador;
            return $charge;
        });

        // dd($room);
        session()->put([
            'room' => $room,
            'idRoom' => $id,
            'totalTransformers' => $totalTransformers,
            'totalKw' => $totalKw,
            'totalA' => $totalA,
        ]);

        return Inertia::render('Rooms/Room/Show', [
            'room' => $room,
            'idRoom' => $id,
            'totalTransformers' => $totalTransformers,
            'totalKw' => $totalKw,
            'totalA' => $totalA
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::find($id);

        return Inertia::render('Rooms/Room/Edit', [
            'data' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $room = Room::find($id);
        $room->update($request->all());

        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->route('room.index');
    }
}
