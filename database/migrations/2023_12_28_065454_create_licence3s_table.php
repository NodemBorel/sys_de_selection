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
        Schema::create('licence3s', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("sexe");
            $table->string("nationalite");
            $table->string("email");
            $table->string("typebaccalaureat");
            $table->float("moyenne");
            $table->float("age");
            $table->string("region");
            $table->string("nomEtb1");
            $table->string("mgp1");
            $table->string("nomEtb2");
            $table->string("mgp2");
            $table->string("numero");
            $table->string("filiere");
            $table->string("numActe");
            $table->date("dateNaiss");
            $table->string("lieuNaiss");
            $table->string("langue");
            $table->string("adresse");
            $table->string("provDiplome");
            $table->string("acte_naissance")->default('1712985494A.pdf');
            $table->string("releve")->default('1712985494R.pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licence3s');
    }
};
