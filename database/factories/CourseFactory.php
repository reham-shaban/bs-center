<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        // Define category IDs for English and Arabic
        $englishCategoryIds = [1, 2, 3, 4, 5, 6];
        $arabicCategoryIds = [7, 8, 9];

        // Randomly select language
        $lang = $this->faker->randomElement(['en', 'ar']);

        // Select category ID based on language
        $categoryIds = $lang === 'en' ? $englishCategoryIds : $arabicCategoryIds;

        // Generate slug based on title
        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'category_id' => $this->faker->optional()->randomElement($categoryIds),
            'title' => $title,
            'slug' => $slug,
            'h1' => $this->faker->sentence,
            'lang' => $lang,
            'overview' => $this->faker->paragraphs(3, true),
            'description' => $this->faker->paragraph,
            'objectives' => $this->faker->paragraphs(3, true),
            'brief' => $this->faker->paragraph,
            'image_alt' => $this->faker->words(3, true),
            'image_title' => $this->faker->words(3, true),
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => $this->faker->words(10, true),
            'meta_robots' => 'index,follow',
            'meta_image_size' => '1200x630',
            'meta_type' => 'website',
            'meta_site_name' => $this->faker->company,
            'meta_site' => $this->faker->url,
            'meta_local' => 'en_US',
            'meta_card' => 'summary_large_image',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
