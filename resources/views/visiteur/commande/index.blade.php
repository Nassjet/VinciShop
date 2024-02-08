@extends('main')
@section('title',"Visiteur- Vinci'SHOP")
@section("content")
<div id="page" class="site">
    {{--        <a class="skip-link screen-reader-text" href="#content">Aller au contenu principal</a>--}}


<main class="container-fluid container-md">

    <h1>Nos Commandes et réservations</h1>
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <h2>Commandes</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Date</th>
                        <th>Prix</th>
                        <th>Etat</th>

                        <th>Consulter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $uneCommande )
                    <tr>
                        <td>{{$uneCommande->id}}</td>
                        <td>{{$uneCommande->created_at}}</td>
                        <td>{{$uneCommande->prix()}}€</td>
                        <td>{{$uneCommande->etat}}</td>

                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-12 col-lg-5 mx-auto">
            <h2>Reservations</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Numero</th>
                        <th>Date</th>
                        <th>Prix</th>
                        <th>Etat</th>
                        <th>Details</th>
                        <th>Consulter</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $uneReservation )
                    <tr>
                        <td>{{$uneReservation->id}}</td>
                        <td>{{$uneReservation->created_at}}</td>
                        <td>{{$uneReservation->prix()}}€</td>
                        <td>{{$uneReservation->etat}}</td>
                        <td>
                          {{$uneReservation->produit->nom}} X {{$uneReservation->quantite}}
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
