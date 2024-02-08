@extends('main')

@section('title', "$produit->nom - VINCI'SHOP")

@section('content')
    <div id="page" class="site">
        {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}



        <div class="site-content-contain">
            <div id="content" class="site-content container">

                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('storage/' . $produit->lienImage) }}" alt="{{ $produit->name }}" width="100%" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col">
                                {{-- @if($produit->qteEnStock == 0)
                                    <div class="alert alert-danger text-center" role="alert">
                                        Ce produit est actuellement indisponible
                                    </div>
                                @else --}}
                                <form action="{{ route('cart.add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $produit->id }}">
                                    <h2>{{ $produit->nom }}</h2>
                                    <p>{!! $produit->description !!}</p>
                                    <p><strong>Prix</strong> : {{ $produit->prix }} €</p>
                                    <label for="quantity"><p><strong>Quantité</strong> : </label><label
                                        for="quantite"></label><input class="mt-2" type="number" name="quantite" id="quantite" min="1" max="{{ $produit->qte }}" value="1">

                                    <button type="submit" class="btn btn-primary mt-3" style="border: none">Ajouter au panier</button>
                                </form>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- #content -->
@endsection

@section('scripts')

@endsection
