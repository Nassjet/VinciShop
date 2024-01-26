@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class='container'>
    <h1>Tableau d'administration des produits</h1>
    <div class="row">
        <a href="produit/create" class="btn btn.primary">Ajouter un nouveau produit</a>
    </div>
    <div class="row my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>PrixHT</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lesProduits as $unProduit)
                <tr>
                    <td>{{$unProduit->nom}}</td>
                    <td>{{$unProduit->categorie->nom}}</td>
                    <td>{{$unProduit->prix}}</td>
                    <td>{{$unProduit->prixHT}}</td>
                    <td>
                        <div class="col">
                            <a href="/admin/produit/{{$unProduit->id}}" class="btn btn-primary">Consulter</a>
                        </div>
                        <div class="col">
                            <a href="/admin/produit/{{$unProduit->id}}/edit" class="btn btn-primary">Modifier</a>
                        </div>
                        <div class="col">
                            <form method="post" action="/admin/produit/{{$unProduit->id}}">
                                @method("delete")
                                @csrf
                                <button class="btn btn-primary">Supprimer</button></form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
