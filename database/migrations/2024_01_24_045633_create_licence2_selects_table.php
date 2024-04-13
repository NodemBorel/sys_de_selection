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
        Schema::create('licence2_selects', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("sexe");
            $table->string("nationalite");
            $table->string("email");
            $table->string("typebaccalaureat");
            $table->float("moyenne");
            $table->integer("age");
            $table->string("region");
            $table->string("nomEtb1");
            $table->string("mgp1");
            $table->string("numero");
            $table->string("filiere");
            $table->string("numActe");
            $table->date("dateNaiss");
            $table->string("lieuNaiss");
            $table->string("langue");
            $table->string("adresse");
            $table->string("delivBac");
            $table->string("provDiplome");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licence2_selects');
    }
};
