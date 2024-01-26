@extends('main')
@section('title',"Visiteur- Vinci'SHOP")
@section("content")
<main class="container">
    {{$lesProduits->links()}}
    <h1>Nos produits</h1>
    <div class="row cols-lg-4 cols-md-3 row-cols-2">
        @foreach ($lesProduits as $produit)


        <div class="col mt-2">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$produit->nom}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
    @endforeach
</main>
@endsection
