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
        $rooms = Room::all();

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

        return redirect()->route('rooms.room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::with('electricCharges')->find($id);
        return Inertia::render('Rooms/Room/Show', [
            'room' => $room,
            'idRoom' => $id,
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

        return redirect()->route('rooms.room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);
        $room->delete();

        return redirect()->route('rooms.room.index');
    }
}
