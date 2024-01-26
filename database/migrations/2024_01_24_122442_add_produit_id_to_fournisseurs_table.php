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
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->unsignedBigInteger('produit_id')->nullable(); // Ajoutez nullable() si la colonne peut être nulle
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fournisseurs', function (Blueprint $table) {
            $table->dropForeign(['produit_id']);
            $table->dropColumn('produit_id');
        });
    }

};
