<?php

namespace App\Http\Controllers;

use App\Models\Jadwalmagang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\JadwalmagangRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Jadwal;

class JadwalmagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $jadwalmagangs = Jadwalmagang::paginate();

        return view('jadwalmagang.index', compact('jadwalmagangs'))
            ->with('i', ($request->input('page', 1) - 1) * $jadwalmagangs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $jadwalmagang = new Jadwalmagang();

        return view('jadwalmagang.create', compact('jadwalmagang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalmagangRequest $request): RedirectResponse
    {
        Jadwalmagang::create($request->validated());

        return Redirect::route('jadwalmagangs.index')
            ->with('success', 'Jadwalmagang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $jadwalmagang = Jadwalmagang::find($id);

        return view('jadwalmagang.show', compact('jadwalmagang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $jadwalmagang = Jadwalmagang::find($id);

        return view('jadwalmagang.edit', compact('jadwalmagang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalmagangRequest $request, Jadwalmagang $jadwalmagang): RedirectResponse
    {
        $jadwalmagang->update($request->validated());

        return Redirect::route('jadwalmagangs.index')
            ->with('success', 'Jadwalmagang updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Jadwalmagang::find($id)->delete();

        return Redirect::route('jadwalmagangs.index')
            ->with('success', 'Jadwalmagang deleted successfully');
    }

    public function welcome(): View
{
    $jadwalMagangs = JadwalMagang::all();
    $jadwals = Jadwal::all();

    return view('welcome', compact('jadwalMagangs', 'jadwals'));

    return view('', compact('jadwalMagangs'));
}

}
