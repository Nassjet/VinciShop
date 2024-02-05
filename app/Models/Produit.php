<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $guarded=["id"];

    public function categorie(){
        return $this->belongsTo(Categorie::class,"categorie_id");
    }
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class,"fournisseur_id");
    }
    public function lignes(){
        return $this->belongsToMany(Produit::class, 'lignes_commandes')->using(LignesCommande::class)->withPivot("quantite")->withTimestamps();
    }
    public function reservations(){
        return $this->hasMany(Reservation::class, 'produit_id');
    }
}
