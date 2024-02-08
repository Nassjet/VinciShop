<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function prix(){
        $resultat = 0;
        foreach ($this->lignes()->get() as $uneLigne){
            $resultat += $uneLigne->prix * $uneLigne->pivot->quantite;
        }
        return $resultat;
    }

    public function user(){
        return $this->belongsto(User::class, 'utilisateur_id');
    }
    // public function lignes(){
    //     return $this->belongsToMany(Produit::class, 'lignes_commandes')->using(LignesCommande::class)->withPivot("quantite")->withTimestamps();
    // }
    public function lignes(){
        return $this->belongsToMany(Produit::class, 'lignes_commandes')->withPivot("quantite")->withTimestamps();
    }
    public function reservations(){
        return $this->hasMany(Reservation::class,"commande_id");
    }

}
