<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeMagangRequest;
use App\Models\PeMagang;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PeMagangController extends Controller
{
    public function __construct()
    {
        // Middleware untuk izin spesifik berdasarkan permission
        $this->middleware('permission:view pe-magang')->only('index', 'show');
        $this->middleware('permission:create pe-magang')->only('create', 'store');
        $this->middleware('permission:edit pe-magang')->only('edit', 'update');
        $this->middleware('permission:delete pe-magang')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $peMagangs = PeMagang::paginate();

        return view('pe-magang.index', compact('peMagangs'))
            ->with('i', ($request->input('page', 1) - 1) * $peMagangs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $peMagang = new PeMagang();

        return view('pe-magang.create', compact('peMagang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeMagangRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('files', 'public');
            $validated['file'] = $path;
        }

        PeMagang::create($validated);

        return Redirect::route('pe-magangs.index')
            ->with('success', 'PeMagang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $peMagang = PeMagang::find($id);

        return view('pe-magang.show', compact('peMagang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $peMagang = PeMagang::find($id);

        return view('pe-magang.edit', compact('peMagang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeMagangRequest $request, PeMagang $peMagang): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('files', 'public');
            $validated['file'] = $path;
        }

        $peMagang->update($validated);

        return Redirect::route('pe-magangs.index')
            ->with('success', 'PeMagang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        PeMagang::find($id)->delete();

        return Redirect::route('pe-magangs.index')
            ->with('success', 'PeMagang deleted successfully');
    }
}