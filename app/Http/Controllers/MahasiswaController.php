<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of all Mahasiswa.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('user')->get(); // Eager load the user relationship
        return response()->json($mahasiswas);
    }

    /**
     * Store a newly created Mahasiswa.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nim' => 'required|string',
            'nama' => 'required|string',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
            'alamat' => 'required|string',
            'notelp' => 'required|string',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Create mahasiswa profile
        $mahasiswa = Mahasiswa::create([
            'user_id' => $user->id,
            'nim' => $validated['nim'],
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'jurusan' => $validated['jurusan'],
            'fakultas' => $validated['fakultas'],
            'alamat' => $validated['alamat'],
            'notelp' => $validated['notelp'],
        ]);

        return response()->json(['message' => 'Mahasiswa created successfully', 'data' => $mahasiswa]);
    }

    /**
     * Display the specified Mahasiswa.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with('user')->findOrFail($id);
        return response()->json($mahasiswa);
    }

    /**
     * Update the specified Mahasiswa.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $validated = $request->validate([
            'nim' => 'sometimes|string',
            'nama' => 'sometimes|string',
            'email' => 'sometimes|string|email',
            'jurusan' => 'sometimes|string',
            'fakultas' => 'sometimes|string',
            'alamat' => 'sometimes|string',
            'notelp' => 'sometimes|string',
        ]);

        $mahasiswa->update($validated);

        return response()->json(['message' => 'Mahasiswa updated successfully', 'data' => $mahasiswa]);
    }

    /**
     * Remove the specified Mahasiswa.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
