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
            $table->unsignedBigInteger('part');
            $table->foreign('part')->references('id')->on('users');
            $table->float('montant');
            $table->string('ref');
            $table->boolean('status_pdg')->default(false);
            $table->boolean('status_caisse')->default(false);
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
