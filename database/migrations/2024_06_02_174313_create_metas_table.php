<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->string('section', 255);

            $table->string('meta_title_en', 255)->nullable();
            $table->text('meta_description_en')->nullable();
            $table->string('meta_keywords_en', 255)->nullable();
            $table->string('meta_robots_en', 255)->nullable();
            $table->string('meta_type_en', 255)->nullable();
            $table->string('meta_site_name_en', 255)->nullable();
            $table->string('meta_site_en', 255)->nullable();
            $table->string('meta_local_en', 255)->nullable();
            $table->text('meta_card_en')->nullable();

            $table->string('meta_title_ar', 255)->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->string('meta_keywords_ar', 255)->nullable();
            $table->string('meta_robots_ar', 255)->nullable();
            $table->string('meta_type_ar', 255)->nullable();
            $table->string('meta_site_name_ar', 255)->nullable();
            $table->string('meta_site_ar', 255)->nullable();
            $table->string('meta_local_ar', 255)->nullable();
            $table->text('meta_card_ar')->nullable();

            $table->string('meta_image_size', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
