<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Material;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facilities = Facility::latest()->paginate(10);
        return view('facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materials = Material::all();
        return view('facilities.create', compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_name' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'last_update_date' => 'required|date',
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id',
        ]);

        $facility = Facility::create([
            'business_name' => $validatedData['business_name'],
            'street_address' => $validatedData['street_address'],
            'last_update_date' => $validatedData['last_update_date'],
        ]);

        $facility->materials()->attach($validatedData['materials']);

        return redirect()->route('facilities.index')->with('success', 'Facility added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
