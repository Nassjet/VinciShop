<?php

namespace App\Http\Controllers;


use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Fournisseur;

class AdminProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits=Produit::all();
        return view("admin.produit.index",["lesProduits"=>$produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        $fournisseurs=Fournisseur::all();
        return view("admin.produit.create",["lesCategories"=>$categories,"lesFournisseurs"=>$fournisseurs]);
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
            "prix" => "required|min:0|numeric",
            "prixHT" => "required|min:0|numeric",
            "qteEnStock"=> "required|min:0|numeric",
            "categorie_id" => "required|exists:categories,id",
            "fournisseur_id" => "required|exists:fournisseurs,id", // Corrigé ici
            "lienImage" => "required|image"
        ]);
        $attributs["lienImage"]=$request->file('lienImage')->store("images/products");

        $produit = Produit::create($attributs);
        session()->flash("success", "Le produit " . $produit->nom . " a été ajouté !");
        return redirect("admin/produit");
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        return view("admin.produit.show", ['unProduit' => $produit]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        $fournisseurs = Fournisseur::all();

        return view('admin.produit.edit', ['produit' => $produit,'lesCategories' => $categories,'lesFournisseurs' => $fournisseurs]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $attributs = $request->validate([
            "nom" => "required|string|min:2|max:255",
            "prix" => "required|min:0|numeric",
            "prixHT" => "required|min:0|numeric",
            "qteEnStock"=> "required|min:0|numeric",
            "categorie_id" => "required|exists:categories,id",
            "fournisseur_id" => "required|exists:fournisseurs,id",
        ]);

        $produit->update($attributs);
        session()->flash("success", "Le produit " . $produit->nom . " a été mis à jour !");
        return redirect("admin/produit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        session()->flash("success", "Suppression réussie");
        return redirect("/admin/produit");
    }
}
