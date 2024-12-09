<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\JadwalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $jadwals = Jadwal::paginate();

        return view('jadwal.index', compact('jadwals'))
            ->with('i', ($request->input('page', 1) - 1) * $jadwals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jadwal = new Jadwal();

        return view('jadwal.create', compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalRequest $request): RedirectResponse
    {
        Jadwal::create($request->validated());

        return Redirect::route('jadwals.index')
            ->with('success', 'Jadwal created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $jadwal = Jadwal::find($id);

        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $jadwal = Jadwal::find($id);

        return view('jadwal.edit', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalRequest $request, Jadwal $jadwal): RedirectResponse
    {
        $jadwal->update($request->validated());

        return Redirect::route('jadwals.index')
            ->with('success', 'Jadwal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        Jadwal::find($id)->delete();

        return Redirect::route('jadwals.index')
            ->with('success', 'Jadwal deleted successfully');
    }
}
