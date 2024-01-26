@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class="container">
    <div class="row">
        <h1>{{$unProduit->nom}}</h1>
    </div>
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <ul>
                <li>Catégorie {{$unProduit->categorie -> nom}}</li>
                <li>Prix: {{$unProduit->prix}}</li>
                <li>Prix HT: {{$unProduit->prixHT}}</li>
                <li>Fournisseur: {{$unProduit->fournisseur->nom}}</li>
                <li>Catégorie: {{$unProduit->categorie->nom}}</li>

            </ul>
            <p>
                {{$unProduit->description}}
            </p>
        </div>
    </div>
    <a href="/admin/produit/" class="btn btn-primary">Revenir au tableau</a>
</main>
@endsection
