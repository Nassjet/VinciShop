@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class="container">
    <div class="row">
        <h1>{{$unFournisseur->nom}}</h1>
    </div>
    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            <ul>
                <li>Adresse : {{$unFournisseur->adresse}}</li>
                <li>Ville : {{$unFournisseur->ville}}</li>
                <li>Email : {{$unFournisseur->email}}</li>
                <li>Téléphone : {{$unFournisseur->tel}}</li>
            </ul>
        </div>
    </div>
    <a href="/admin/fournisseur/" class="btn btn-primary">Revenir au tableau</a>
</main>
@endsection
