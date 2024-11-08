<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $mejas = Meja::all();
        return view('meja.index', compact('mejas'));
    }

    public function create()
    {
        return view('meja.create');
    }

    public function store(Request $request)
    {
        Meja::create($request->validate([
            'nomor_meja' => 'required|string|unique:mejas,nomor_meja',
            'kapasitas' => 'required|integer',
            'status' => 'required|boolean'
        ]));
        return redirect()->route('meja.index');
    }

    public function edit($id)
    {
        $meja = Meja::findOrFail($id);
        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, $id)
    {
        $meja = Meja::findOrFail($id);

        // Validate and update the record
        $meja->update($request->validate([
            'nomor_meja' => 'required|string|unique:mejas,nomor_meja,' . $meja->id,
            'kapasitas' => 'required|integer',
            'status' => 'required|boolean'
        ]));
        return redirect()->route('meja.index')->with('success', 'Meja updated successfully');
    }

    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();
        return redirect()->route('meja.index')->with('success', 'Meja deleted successfully');
    }
}
