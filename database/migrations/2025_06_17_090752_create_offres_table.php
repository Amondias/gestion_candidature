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
        Schema::create('offres', function (Blueprint $table) {
        $table->id();
        $table->string('nom_entreprise');
        $table->string('numero');
        $table->string('email')->nullable()->change();
        $table->string('poste')->nullable()->change();
        $table->string('domaine');
        $table->string('specialisation')->nullable();
        $table->text('qualification');
        $table->string('competence');
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
