<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.option.index',[
            'options' => Option::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ici, on préremplir certains champs par defaut
        $option = new Option();

        return view('admin.option.formCreate',[
            'option' => $option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        $option = Option::create($request->validated());

        return to_route('admin.option.index')->with('success', 'Option créée avec succès');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option $option)
    {
        return view('admin.option.formCreate', [
            'option' => $option
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(optionRequest $request, Option $option)

    
    {
       // dd($request->validated());
        $option->update($request->validated());

        return to_route('admin.option.index')->with('success', 'Option modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'Option supprimée avec succès');
    }
}
