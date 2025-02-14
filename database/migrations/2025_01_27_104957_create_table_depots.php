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
        Schema::create('depots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partenaire');
            $table->foreign('partenaire')->references('id')->on('users');
            $table->float('montant');
            $table->string('ref')->unique();
            $table->boolean('pdg')->default(false);
            $table->boolean('comptable')->default(false);
            $table->string('photo');
            $table->timestamp("date_depot");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('depots', function (Blueprint $table) {
            //
        });
    }
};
