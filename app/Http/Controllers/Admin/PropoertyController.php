<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropoertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property.index',[
            'properties' => Property::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ici, on préremplir certains champs par defaut
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Cotonou',
            'postal_code' => 34000,
            'sold' => false,
        ]);
        return view('admin.property.formCreate',[
            'property' => $property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $property = Property::create($request->validated());

        return to_route('admin.property.index')->with('success', 'Bien créé avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.property.formCreate', [
            'property' => $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)

    
    {
       // dd($request->validated());
        $property->update($request->validated());

        return to_route('admin.property.index')->with('success', 'Bien modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Bien supprimé avec succès');
    }
}
