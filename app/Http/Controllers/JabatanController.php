<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the jabatans.
     */
    public function index()
    {
        $jabatans = Jabatan::all(); // Get all jabatans
        return view('jabatans.index', compact('jabatans')); // Return to a view
    }

    /**
     * Show the form for creating a new jabatan.
     */
    public function create()
    {
        return view('jabatans.create'); // Show the create form
    }

    /**
     * Store a newly created jabatan in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
        ]);

        Jabatan::create([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('jabatans.index')->with('success', 'Jabatan created successfully.');
    }

    /**
     * Show the specified jabatan.
     */
    public function show(Jabatan $jabatan)
    {
        return view('jabatans.show', compact('jabatan'));
    }

    /**
     * Show the form for editing the specified jabatan.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('jabatans.edit', compact('jabatan'));
    }

    /**
     * Update the specified jabatan in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'jabatan' => 'required|string|max:255',
        ]);

        $jabatan->update([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('jabatans.index')->with('success', 'Jabatan updated successfully.');
    }

    /**
     * Remove the specified jabatan from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('jabatans.index')->with('success', 'Jabatan deleted successfully.');
    }
}
