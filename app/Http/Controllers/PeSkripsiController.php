<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\PeSkripsi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\PeSkripsiRequest;
use Illuminate\Support\Facades\Redirect;

/**
 * Class PeSkripsiController
 * @package App\Http\Controllers
 */
class PeSkripsiController extends Controller
{

    public function __construct()
    {
        // Middleware untuk izin spesifik berdasarkan permission
        $this->middleware('permission:view pe-skripsi')->only('index', 'show');
        $this->middleware('permission:create pe-skripsi')->only('create', 'store');
        $this->middleware('permission:edit pe-skripsi')->only('edit', 'update');
        $this->middleware('permission:delete pe-skripsi')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peSkripsis = PeSkripsi::paginate();

        return view('pe-skripsi.index', compact('peSkripsis'))
            ->with('i', (request()->input('page', 1) - 1) * $peSkripsis->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peSkripsi = new PeSkripsi();
        return view('pe-skripsi.create', compact('peSkripsi'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'files.*' => 'file|mimes:pdf,doc,docx|max:2048', // Validasi file
        ]);

        $peSkripsi = PeSkripsi::create($request->only('nama_mahasiswa', 'nim', 'judul_sementara', 'dosen_pembimbing', 'jenis_skripsi'));

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $path = $file->store('files', 'public'); // Simpan file ke folder 'files'
                $peSkripsi->files()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('pe-skripsis.index')
            ->with('success', 'Skripsi submitted successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peSkripsi = PeSkripsi::find($id);

        return view('pe-skripsi.show', compact('peSkripsi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peSkripsi = PeSkripsi::find($id);

        return view('pe-skripsi.edit', compact('peSkripsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeSkripsiRequest $request, PeSkripsi $peSkripsi)
    {
        // Update data utama
        $peSkripsi->update($request->validated());

        // Perbarui file jika ada file baru
        if ($request->hasFile('files')) {
            // (Opsional) Hapus file lama dari storage
            foreach ($peSkripsi->files as $existingFile) {
                Storage::disk('public')->delete($existingFile->file_path);
                $existingFile->delete(); // Hapus record file lama dari database
            }

            // Simpan file baru
            foreach ($request->file('files') as $file) {
                $path = $file->store('files', 'public');

                // Simpan informasi file ke database
                $peSkripsi->files()->create([
                    'file_path' => $path,
                    'file_name' => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()->route('pe-skripsis.index')
            ->with('success', 'Pengajuan Skripsi updated successfully.');
    }
    public function destroy($id): RedirectResponse
    {
        PeSkripsi::find($id)->delete();

        return Redirect::route('pe-skripsis.index')
            ->with('success', 'Pengajuan deleted successfully');
    }
}