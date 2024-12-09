<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function index()
    {
        $bimbingans = Bimbingan::with(['mahasiswa', 'dosen'])->get();
        return view('bimbingan.index', compact('bimbingans'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('bimbingan.create', compact('mahasiswas', 'dosens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'judul' => 'required|string|max:255',
        ]);

        Bimbingan::create($request->all());
        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $bimbingan = Bimbingan::with(['mahasiswa', 'dosen'])->findOrFail($id);
        return view('bimbingan.show', compact('bimbingan'));
    }

    public function edit($id)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $mahasiswas = Mahasiswa::all();
        $dosens = Dosen::all();
        return view('bimbingan.edit', compact('bimbingan', 'mahasiswas', 'dosens'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'dosen_id' => 'required|exists:dosens,id',
            'judul' => 'required|string|max:255',
        ]);

        $bimbingan = Bimbingan::findOrFail($id);
        $bimbingan->update($request->all());
        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $bimbingan = Bimbingan::findOrFail($id);
        $bimbingan->delete();
        return redirect()->route('bimbingan.index')->with('success', 'Bimbingan berhasil dihapus.');
    }
}
