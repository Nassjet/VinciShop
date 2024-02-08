<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ClientCommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUtilisateur = auth()->user()->id;
        $commandes = Commande::where("utilisateur_id", $idUtilisateur)->get();

        $reservations = [];
        foreach ($commandes as $uneCommande) {

            foreach ($uneCommande->reservations as $uneReservation) {
                array_push($reservations, $uneReservation);
            }
        }



        return view("visiteur.commande.index", ["commandes" => $commandes, "reservations" => $reservations]);
    }
}
