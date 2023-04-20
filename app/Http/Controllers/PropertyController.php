<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertySearchRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(PropertySearchRequest $request){

        //le with permet juste de charger les option de chaque property

        $query = Property::query()->orderBy('created_at')->with('options');

        //la requete à preparer  s'il y a price dans la request(bar de cherche)
        if($request->validated('price')){
            $query = $query->where('price', '<=', $request->validated('price'));
        }
        if($request->validated('surface')){
            $query = $query->where('surface', '=<', $request->validated('surface'));
        }
        if($request->validated('rooms')){
            $query = $query->where('rooms', '=<', $request->validated('rooms'));
        }
        if($request->validated('title')){
            $query = $query->where('title', 'like', "%{$request->validated('title')}%");
        }

        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }
    public function show(string $slug, Property $property){
        //vérification si c'est le bon slug

        $expertiseSlug = $property->getSlug();
        if ($slug !== $expertiseSlug) {
            return to_route('property.show', ['slug' => $expertiseSlug, 'property' => $property]);
        
        }

        return view('property.show', [
            'property' => $property
        ]);
    }
}
