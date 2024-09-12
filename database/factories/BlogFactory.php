<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        // Generate slug based on title
        $title = $this->faker->sentence;
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'h1' => $this->faker->sentence,
            'lang' => $this->faker->randomElement(['en', 'ar']),
            'description' => $this->faker->paragraphs(3, true),
            'tag_name' => $this->faker->randomElement(['article', 'blog', 'tag1', 'tag2']),
            'slug' => $slug,
            'number_of_views' => $this->faker->numberBetween(0, 300),
            'image_alt' => $this->faker->sentence,
            'image_title' => $this->faker->sentence,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => $this->faker->words(5, true),
            'meta_robots' => $this->faker->randomElement(['index,follow', 'noindex,nofollow']),
            'meta_image_size' => $this->faker->randomElement(['1200x630', '800x600']),
            'meta_type' => $this->faker->randomElement(['article', 'blog']),
            'meta_site_name' => $this->faker->company,
            'meta_site' => $this->faker->url,
            'meta_local' => $this->faker->randomElement(['en_US', 'ar_SA']),
            'meta_card' => $this->faker->randomElement(['summary', 'summary_large_image']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
