<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produit;

class AdminFournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs=Fournisseur::all();
        return view("admin.fournisseur.index",["lesFournisseurs"=>$fournisseurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseur=Fournisseur::all();
        return view("admin.fournisseur.create",["lesFournisseurs"=>$fournisseur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributs = $request->validate([
            "nom" => "required|string|min:2|max:255",
            "adresse" => "required|min:0|string",
            "ville" => "required|min:0|string",
            "email"=> "required|min:0|email",
            "tel" => "required|min:0|numeric", // Syntaxe corrigée ici
        ]);

        $fournisseur= Fournisseur::create($attributs);
        session()->flash("success", "Le fournisseur " . $fournisseur->nom . " a été ajouté !");
        return redirect("admin/fournisseur");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show(Fournisseur $fournisseur)
    {
        return view("admin.fournisseur.show", ['unFournisseur' => $fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
