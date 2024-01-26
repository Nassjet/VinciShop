@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class='container'>
    <h1>Tableau d'administration des fournisseurs</h1>
    <div class="row">
        <a href="create" class="btn btn.primary">Ajouter un nouveau fournisseur</a>
    </div>
    <div class="row my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lesFournisseurs as $unFournisseur)
                <tr>
                    <td>{{$unFournisseur->nom}}</td>
                    <td>{{$unFournisseur->adresse}}</td>
                    <td>{{$unFournisseur->ville}}</td>
                    <td>{{$unFournisseur->email}}</td>
                    <td>{{$unFournisseur->tel}}</td>
                    <td>
                        <div class="col">
                            <a href="/admin/fournisseur/{{$unFournisseur->id}}" class="btn btn-primary">Consulter</a>
                        </div>
                        <div class="col">
                            <a href="/admin/fournisseur/{{$unFournisseur->id}}/edit" class="btn btn-primary">Modifier</a>
                        </div>
                        <div class="col">
                            <form method="post" action="/admin/fournisseur/{{$unFournisseur->id}}">
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
