@extends('main')

@section('title', "Panier - VINCI'SHOP")

@section('content')
    <div id="page" class="site">
        {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}




        <div class="site-content-contain">
            <div id="content" class="site-content container">

                <div class="row">
                    <div class="col-md-12">
                        @if($cart == [])
                            <div class="alert alert-danger text-center">
                                Votre panier est vide <br> <a class="text-decoration-underline" href="/visiteur/produit">Retourner à la boutique</a>
                            </div>
                        @else
                            <h1 class="mb-5">Votre panier</h1>
                            @if($errors->any())
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th></th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $product)
                                    <tr>
                                        <td>{{ $product['nom'] }}</td>
                                        <td>{{ $product['prix'] }} €</td>
                                        <form action="{{ route('cart.update') }}" method="post">
                                            @csrf
                                            <td>
                                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                                <div class="input-group">
                                                    <label>
                                                        <input type="number" name="quantite" value="{{ $product['quantite'] }}" min="1" class="form-control">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn mt-1" style="border: none">Modifier</button>
                                            </td>
                                        </form>
                                        <td>{{ $product['prix'] * $product['quantite'] }} €</td>
                                        <td>
                                            <form action="{{ route('cart.remove') }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $product['id'] }}" name="id">
                                                <button type="submit" class="btn" style="border: none">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row text-center">
                                <div class="col-auto me-auto">
                                    <h2>Total : {{ $total }} €</h2>
                                </div>
                                <div class="col-auto">
                                    <a href="/visiteur/produit" class="wp-block-button__link"
                                       style="color: white; background-color: #00b5e8">
                                        Continuer votre commande
                                    </a>
                                    <a href="{{ route('cart.destroy') }}" class="wp-block-button__link"
                                       style="color: white; background-color: firebrick">
                                        Vider le panier
                                    </a>
                                    <a href="{{ route('cart.checkout') }}" class="wp-block-button__link"
                                       style="color: white; background-color: green;">
                                        Réserver*
                                    </a>
                                    {{--                                <a href="{{ route('products') }}" class="btn btn-primary">Continuer votre commande</a>--}}
                                    {{--                                <a href="{{ route('cart.destroy') }}" class="btn btn-danger">Vider le panier</a>--}}
                                    {{--                                <a href="{{ route('cart.checkout') }}" class="btn btn-success">Réserver</a>--}}
                                </div>
                                <p class="text-end mt-1">(Dans le cas où votre commande dépasse le stock disponible, une réservation sera automatiquement créée.)</p>
                                <p class="text-muted text-start mt-5">*Cette commande ne fait compte que de réservation, vous avez rdv dans le lycée aux <a href="/#horaires" class="text-muted text-decoration-underline">horaires d'ouverture du pop up store</a> afin de payer et récupérer vos produits</p>
                            </div>
                        @endif
                    </div>
                </div>

            </div><!-- #content -->
@endsection

@section('scripts')

@endsection
