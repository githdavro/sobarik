<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of dosens with their jabatan.
     */
    public function index()
    {
        $dosens = Dosen::with('jabatan')->get();
        return response()->json($dosens);
    }

    /**
     * Show the form for creating a new dosen.
     */
    public function create()
    {
        $jabatans = Jabatan::all(); // Fetch all available jabatans
        return view('dosens.create', compact('jabatans'));
    }

    /**
     * Store a newly created dosen in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        Dosen::create($validated);

        return redirect()->route('dosens.index')->with('success', 'Dosen created successfully.');
    }

    /**
     * Display the specified dosen with their jabatan.
     */
    public function show(Dosen $dosen)
    {
        return response()->json($dosen->load('jabatan'));
    }

    /**
     * Show the form for editing the specified dosen.
     */
    public function edit(Dosen $dosen)
    {
        $jabatans = Jabatan::all(); // Fetch all available jabatans
        return view('dosens.edit', compact('dosen', 'jabatans'));
    }

    /**
     * Update the specified dosen in storage.
     */
    public function update(Request $request, Dosen $dosen)
    {
        $validated = $request->validate([
            'nip' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'bidang_keahlian' => 'required|string|max:255',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        $dosen->update($validated);

        return redirect()->route('dosens.index')->with('success', 'Dosen updated successfully.');
    }

    /**
     * Remove the specified dosen from storage.
     */
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()->route('dosens.index')->with('success', 'Dosen deleted successfully.');
    }
}
