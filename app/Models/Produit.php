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
}
