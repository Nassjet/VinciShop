<?php

namespace App\Http\Controllers;

use App\Mail\CommandSuccess;
use App\Models\Commande;
use App\Models\LignesCommande;
use App\Models\Produit;
use App\Models\Reservation;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller {
    public function index(): Factory|View|Application
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $ligneProduit) {
            $total += $ligneProduit['prix'] * $ligneProduit['quantite'];
        }

        return view('cart', ['cart' => $cart, 'total' => $total]);
    }

    public function add(Request $request): RedirectResponse
    {
        $form=$request->validate(['id'=>"required|exists:produits,id",'quantite'=>'required|min:1|numeric|max:50']);

        $ligneProduit = Produit::findOrFail($form["id"]);
        $quantite = $form["quantite"];
        $cart = session()->get('cart', []);

        $cart[$ligneProduit->id] = [
            'id' => $ligneProduit->id,
            'prix' => $ligneProduit->prix,
            'nom'=>$ligneProduit->nom,
            'quantite' => $quantite,
        ];
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function update(Request $request): RedirectResponse
    {
        $form=$request->validate(['id'=>"required|exists:produits,id",'quantite'=>'required|min:1|numeric|max:50']);

        $ligneProduit = Produit::findOrFail($form["id"]);
        $quantite = $form["quantite"];

        $cart = session()->get('cart', []);
        $cart[$ligneProduit->id]['quantite'] = $quantite;
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove(Request $request): RedirectResponse
    {
        $ligneProduit = Produit::findOrFail($request->id);
        $cart = session()->get('cart', []);
        unset($cart[$ligneProduit->id]);
        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function destroy(): RedirectResponse
    {
        session()->forget('cart');

        return redirect()->route('cart');
    }

    public function checkout(): Application|Factory|View|RedirectResponse
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $ligneProduit) {
            $total += $ligneProduit['prix'] * $ligneProduit['quantite'];
        }

        if ($cart == null) {
            return redirect()->route('cart');
        }

        return view('checkout', ['cart' => $cart, 'total' => $total]);
    }

    public function checkoutSend(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'nom' => array(
        //         'required',
        //         'regex:/^[A-Za-zÀ-ÖØ-ö\s]+$/',
        //         'max:40'
        //     ),
        //     'prenom' => array(
        //         'required',
        //         'regex:/^[A-Za-zÀ-ÖØ-ö\s]+$/',
        //         'max:40'
        //     ),
        //     'email' => 'required|email|max:40',
        // ]);
        $cart = session()->get('cart');
        //TODO verification panier

        $utilisateur=auth()->user();
        $commande = Commande::create(["etat"=>"En préparation","utilisateur_id"=>$utilisateur->id]);


        $total = 0;
        foreach ($cart as $ligneProduit) {
        $produit=Produit::findOrFail($ligneProduit["id"]);
        $reste = $produit->qteEnStock - $ligneProduit['quantite'];
        if($produit->qteEnStock<0){
            //Affecte pas le prix
            // créer les reservation
        //Créer une reservation avec le reste
      Reservation::create([
        "quantite"=> $ligneProduit['quantite'],
        "etat"=>"En attente",
        "produit_id"=>$produit->id,
        "commande_id"=>$commande->id
      ]);
        }

        else if($reste<0){
            $quantiteCommande= $produit->qteEnStock;
            LignesCommande::create([
                "quantite"=>$quantiteCommande,
                "commande_id"=>$commande->id,
                "produit_id"=>$produit->id
            ]);
            //Créer une reservation avec le reste
            Reservation::create([
                "quantite"=> -$reste,
                "etat"=>"En attente",
                "produit_id"=>$produit->id,
                "commande_id"=>$commande->id
              ]);
            // Pour le total a verifier si les reservations son payer avec la commande ou séparement
            $total += $ligneProduit['prix'] * $quantiteCommande;

        }
        else {
            $total += $ligneProduit['prix'] * $ligneProduit['quantite'];
            LignesCommande::create([
                "quantite"=>$ligneProduit['quantite'],
                "commande_id"=>$commande->id,
                "produit_id"=>$produit->id
            ]);
        }
        $produit->qteEnStock-=$ligneProduit['quantite'];
        $produit->save();



        //     $total += $ligneProduit['prix'] * $ligneProduit['quantite']; //1
        //     $p = Produit::findOrFail($ligneProduit['id']);
        //     $reste = $produit->qteEnStock - $ligneProduit['quantite'];
        //     if ($reste < 0) {
        //         $quantiteCommande=$ligneProduit['quantite']+$reste;//3
        //         session()->forget('cart');
        //         return redirect()->route('cart')->withErrors(['error', 'Un produit est en rupture de stock']);
        //     } else {
        //         $quantiteCommande=$ligneProduit['quantite'];
        //         $p->qte = $reste;
        //         $p->save();
        //     }
        // }




        session()->forget('cart');
        session()->put('success', true);

        // Mail::to($request->email)->send(new CommandSuccess($utilisateur->email, json_encode($cart), $total));

        return redirect()->route('index');
    }

}
}
