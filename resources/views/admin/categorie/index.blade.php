@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class='container'>
    <h1>Tableau d'administration des Catégories</h1>
    <div class="row">
        <a href="categorie/create" class="btn btn.primary">Ajouter d'une nouvelle catégorie</a>
    </div>
    <div class="row my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lesCategories as $uneCategorie)
                <tr>
                    <td>{{$uneCategorie->nom}}</td>
                    <td>
                        <div class="col">
                            <a href="/admin/categorie/{{$uneCategorie->id}}" class="btn btn-primary">Consulter</a>
                        </div>
                        <div class="col">
                            <a href="/admin/categorie/{{$uneCategorie->id}}/edit" class="btn btn-primary">Modifier</a>
                        </div>
                        <div class="col">
                            <form method="post" action="/admin/categorie/{{$uneCategorie->id}}">
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
