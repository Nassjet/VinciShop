@extends('main')
@section('title',"Visiteur- Vinci'SHOP")
@section("content")
<div id="page" class="site">
    {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}


<main class="container">
    {{$lesProduits->links()}}
    <h1>Nos produits</h1>
    <div class="row cols-lg-4 cols-md-3 row-cols-2">
        @foreach ($lesProduits as $produit)


        <div class="col mt-2">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/images/products/' . $produit->lienImage) }}" class="card-img-top" alt="{{ $produit->nom }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $produit->nom }}</h5>
                    <p class="card-text">{{ $produit->description }}</p>
                    <p class="card-text">Prix: {{ $produit->prix }} €</p>
                    <a href="{{ route('product', ['id' => $produit->id]) }}" class="btn btn-primary">Voir le produit</a>
                </div>
            </div>
        </div>




    @endforeach
</main>
@endsection
