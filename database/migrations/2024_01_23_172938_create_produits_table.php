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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->float("prix");
            $table->float("prixHT");
            $table->string("description")->default("");
            $table->string("lienImage")->nullable();
            $table->integer("qteEnStock");
            $table->foreignId("categorie_id")->constrained("categories")->onDelete("cascade");
            $table->foreignId("fournisseur_id")->constrained("fournisseurs")->onDelete("cascade");
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
        Schema::dropIfExists('produits');
    }
};
