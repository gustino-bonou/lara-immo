<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;

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
            'property' => $property,
            //on envoie les options disponibles à la page de 
            //formulaire pour création et édition de property
            //la function pluck est utile pour cela, 
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        
        $property = Property::create($request->validated());

        //ici on prend par la relation options sur property afin de faire une synchronisation
        //la fonction sync sur la relation permet cela en prenant un tableau d'option
        //genre dans la table àption_property, on aura des colonnes
        //ceProperty => toutes les otions choisies
        $property->options()->sync($request->validated('options'));


        return to_route('admin.property.index')->with('success', 'Bien créé avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.property.formCreate', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)

    
    {
        //ici on prend par la relation options sur property afin de faire une synchronisation
        //la fonction sync sur la relation permet cela en prenant un tableau d'option
        //genre dans la table àption_property, on aura des colonnes
        //ceProperty => toutes les otions choisies
        $property->options()->sync($request->validated('options'));

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
