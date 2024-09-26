<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:positions|max:255',
        ]);

        Position::create($request->all());
        return redirect()->route('positions.index')->with('success', 'Cargo creado con éxito.');
    }


    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:positions,name,' . $position->id,
        ]);

        $position->update($request->all());
        return redirect()->route('positions.index')->with('success', 'Cargo actualizado con éxito.');
    }


    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Cargo eliminado con éxito.');
    }
}
