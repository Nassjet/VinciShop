<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded=["id"];
    public function prix(){
        $resultat = $this->produit->prix*$this->quantite;
        return $resultat;
    }
    public function commande(){
        return $this->belongsTo(Commande::class,"commande_id");
    }
    public function produit(){
        return $this->belongsTo(Produit::class,"produit_id");
    }
}
