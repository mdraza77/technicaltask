<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    public function index(Request $request)
    {
        // $query = Facility::query();
        $query = $request->user()->facilities()->latest();

        $query->when($request->search, function ($q, $search) {
            return $q->where('business_name', 'like', "%{$search}%")
                ->orWhere('street_address', 'like', "%{$search}%");
        });

        $facilities = $query->latest()->paginate(10)->appends($request->query());

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

        // $facility = Facility::create([
        //     'business_name' => $validatedData['business_name'],
        //     'street_address' => $validatedData['street_address'],
        //     'last_update_date' => $validatedData['last_update_date'],
        // ]);

        // $facility->materials()->attach($validatedData['materials']);

        // return redirect()->route('facilities.index')->with('success', 'Facility added successfully!');

        $dataToSave = array_merge($validatedData, ['user_id' => Auth::id()]);

        $facility = Facility::create($dataToSave);

        $facility->materials()->attach($validatedData['materials']);

        return redirect()->route('facilities.index')->with('success', 'Facility added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        return view('facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        if (Auth::id() !== $facility->user_id) {
            abort(403, 'Unauthorized Action');
        }
        $materials = Material::all();
        return view('facilities.edit', compact('facility', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $facility)
    {
        if (Auth::id() !== $facility->user_id) {
            abort(403);
        }

        $validatedData = $request->validate([
            'business_name' => 'required|string|max:255',
            'street_address' => 'required|string|max:255',
            'last_update_date' => 'required|date',
            'materials' => 'required|array',
            'materials.*' => 'exists:materials,id',
        ]);

        $facility->update([
            'business_name' => $validatedData['business_name'],
            'street_address' => $validatedData['street_address'],
            'last_update_date' => $validatedData['last_update_date'],
        ]);

        $facility->materials()->sync($validatedData['materials']);

        return redirect()->route('facilities.index')->with('success', 'Facility updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        if (Auth::id() !== $facility->user_id) {
            abort(403);
        }
        $facility->delete();
        return redirect()->route('facilities.index')->with('success', 'Facility moved to trash successfully!');
    }

    public function trashed(Request $request)
    {
        // $facilities = Facility::onlyTrashed()->latest()->paginate(10);
        $facilities = $request->user()->facilities()->onlyTrashed()->latest()->paginate(10);

        return view('facilities.trashed', compact('facilities'));
    }

    public function restore($id)
    {
        $facility = Facility::onlyTrashed()->findOrFail($id);

        $facility->restore();

        return redirect()->route('facilities.trashed')->with('success', 'Facility restored successfully!');
    }

    public function forceDelete(Request $request, $id)
{
    $facility = $request->user()->facilities()->onlyTrashed()->findOrFail($id);
    
    $facility->forceDelete();

    return redirect()->route('facilities.trashed')->with('success', 'Facility permanently deleted!');
}
}
