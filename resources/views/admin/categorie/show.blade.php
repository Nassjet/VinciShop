@extends('main')
@section('title',"Admin - Vinci'SHOP")
@section("content")
<main class="container">
    <div class="row">
        <h1>{{$uneCategorie->nom}}</h1>
    </div>
    <a href="/admin/categorie/" class="btn btn-primary">Revenir au tableau</a>
</main>
@endsection
