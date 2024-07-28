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
        Schema::create('request_in_house', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');

            $table->string('location', 150)->nullable();
            $table->integer('number_of_days')->nullable();
            $table->integer('number_of_participants')->nullable();
            $table->longText('message')->nullable();

            $table->timestamps();
            $table->softDeletes();

            // Add foreign key constraints:
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_in_house');
    }
};
