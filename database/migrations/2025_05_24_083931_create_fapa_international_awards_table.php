<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFapaInternationalAwardsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fapa_international_awards', function (Blueprint $table) {
            $table->id();
            $table->string('title', 10);
            $table->string('name', 255);
            $table->string('honors', 255)->nullable();
            $table->string('club', 255)->nullable();
            $table->string('address', 500);
            $table->string('country', 100);
            $table->string('email', 255);
            $table->string('telephone', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fapa_international_awards');
    }
};
