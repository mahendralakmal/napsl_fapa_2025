<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('section');
            $table->string('first_name');
            $table->string('surname');
            $table->string('telephone');
            $table->string('age')->nullable();
            $table->string('grade')->nullable();
            $table->string('school')->nullable();
            $table->string('year_of_study')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('membership_number')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->float('paid_amount',11,2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
