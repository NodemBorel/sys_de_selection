<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctorat_selects', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("sexe");
            $table->float("age");
            $table->string("nationalite");
            $table->string("email");
            $table->string("region");
            $table->string("nomEtb5");
            $table->string("mgp5");
            $table->string("numero");
            $table->string("filiere");
            $table->string("numActe");
            $table->date("dateNaiss");
            $table->string("lieuNaiss");
            $table->string("langue");
            $table->string("adresse");
            $table->string("provDiplome");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctorat_selects');
    }
};
