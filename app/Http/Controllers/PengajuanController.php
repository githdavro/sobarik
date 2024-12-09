<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\JenisPengajuan;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Use pagination for better performance with large datasets
        $pengajuans = Pengajuan::with('mahasiswa', 'jenisPengajuan')->paginate(10);
        return view('pengajuans.index', compact('pengajuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all Mahasiswa records
        $mahasiswas = Mahasiswa::all();

        // Fetch all JenisPengajuan records
        $jenisPengajuans = JenisPengajuan::all();

        // Get the currently authenticated user
        $currentUser  = auth()->user();

        // Check if the authenticated user has a corresponding Mahasiswa record
        $currentMahasiswa = $currentUser  ? $currentUser->mahasiswa : null;

        // Pass the data to the view
        return view('pengajuans.create', compact('mahasiswas', 'jenisPengajuans', 'currentMahasiswa'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'jenis_pengajuan_id' => 'required|exists:jenis_pengajuans,id', // Make sure the input field matches
            'judul_sementara' => 'required|string',
            'dosen_pembimbing' => 'required|string',
            'notelp' => 'required|string',
            'nama_instansi' => 'nullable|string',
            'tgl_mulai' => 'nullable|date',
            'tgl_selesai' => 'nullable|date',
        ]);

        Pengajuan::create($request->all());
        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil dibuat.');
    }

    /**
     * Show the specified resource.
     */
    public function show(Pengajuan $pengajuan)
    {
        return view('pengajuans.show', compact('pengajuan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengajuan $pengajuan)
    {
        $mahasiswas = Mahasiswa::all();
        $jenisPengajuans = JenisPengajuan::all();
        return view('pengajuans.edit', compact('pengajuan', 'mahasiswas', 'jenisPengajuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'jenis_pengajuan_id' => 'required|exists:jenis_pengajuans,id', // Ensure consistency in field names
            'judul_sementara' => 'required|string',
            'dosen_pembimbing' => 'required|string',
            'notelp' => 'required|string',
            'nama_instansi' => 'nullable|string',
            'tgl_mulai' => 'nullable|date',
            'tgl_selesai' => 'nullable|date',
        ]);

        $pengajuan->update($request->all());
        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('pengajuans.index')->with('success', 'Pengajuan berhasil dihapus.');
    }
}
