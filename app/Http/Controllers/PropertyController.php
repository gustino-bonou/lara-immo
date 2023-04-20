<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\PropertySearchRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function contact(Property $property, PropertyContactRequest $request){
        /* Une fois qu'on est sur que les données sont valid, on envoie l'email, avec la methode 
        send de la classe email. Cette methode prend un prametre de type maillaibe, ce
        qui eyait crée qui prend lui meme le property et les information envoyes par le clien
        Avec cette foncuion, le mail est envoyué automatiquement
        Il y a aussi l'option de file d'attente que nous allons revoir*/

        Mail::send(new PropertyContactMail($property, $request->validated()));

        return back()->with('succes', 'Nous avons réçu votre contact envoyé, nous vous revenons toute suite');

    }
}
