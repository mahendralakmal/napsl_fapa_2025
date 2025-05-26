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
        Schema::create('exhibition_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exhibition_id');
            $table->foreign('exhibition_id','')->references('id')->on('exhibitions');
            $table->string('image_caption');
            $table->longText('image');
            $table->unsignedBigInteger('user_id');
            $table->integer('count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exhibition_entries');
    }
};
