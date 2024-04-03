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
        Schema::create('clients', function (Blueprint $table) {
            $table-> id();
            $table->string('name',85)->nullable(false);
            $table->string('lastname',50)->nullable(false);
            $table->string('dni',255)->nullable(false);
            $table->string('ubication',255)->nullable(false);
            $table->int('enterprise_id');
            $table->string('slug',500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
