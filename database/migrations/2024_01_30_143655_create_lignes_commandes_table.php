<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignes_commandes', function (Blueprint $table) {
            $table->foreignId('produit_id')->constrained('produits')->onDelete('cascade');
            $table->foreignId('commande_id')->constrained('commandes')->onDelete('cascade');
            $table->integer("quantite");
            $table->primary(["produit_id","commande_id"]); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lignes_commandes');
    }
};
