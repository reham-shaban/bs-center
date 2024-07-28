<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 5)->nullable();
            //
            $table->string('title_en', 250)->nullable();
            $table->string('title_ar', 255)->nullable();
            $table->string('slug_en', 255);
            $table->string('slug_ar', 255);
            $table->string('h1_en', 255)->nullable();
            $table->string('h1_ar', 255)->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->boolean('hidden')->default(false);
            //
            $table->string('meta_title_en', 255)->nullable();
            $table->text('meta_description_en')->nullable();
            $table->string('meta_keywords_en', 255)->nullable();
            $table->string('meta_robots_en', 255)->nullable();
            $table->string('meta_type_en', 255)->nullable();
            $table->string('meta_site_name_en', 255)->nullable();
            $table->string('meta_site_en', 255)->nullable();
            $table->string('meta_local_en', 255)->nullable();
            $table->text('meta_card_en')->nullable();
            //
            $table->string('meta_title_ar', 255)->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->string('meta_keywords_ar', 255)->nullable();
            $table->string('meta_robots_ar', 255)->nullable();
            $table->string('meta_type_ar', 255)->nullable();
            $table->string('meta_site_name_ar', 255)->nullable();
            $table->string('meta_site_ar', 255)->nullable();
            $table->string('meta_local_ar', 255)->nullable();
            $table->text('meta_card_ar')->nullable();
            //
            $table->string('meta_image_size', 255)->nullable();
            $table->string('image_alt_en', 255)->nullable();
            $table->string('image_alt_ar', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
