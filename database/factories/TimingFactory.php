<?php

namespace Database\Factories;

use App\Models\Timing;
use App\Models\Course;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class TimingFactory extends Factory
{
    protected $model = Timing::class;

    public function definition()
    {
        // Retrieve random course and city IDs
        $course = Course::inRandomOrder()->first();
        $city = City::inRandomOrder()->first();

        // Ensure we have valid course and city before proceeding
        if (!$course || !$city) {
            throw new \Exception('Make sure to have some courses and cities created before running the factory.');
        }

        // Generate random date range
        $dateFrom = $this->faker->dateTimeBetween('+1 week', '+1 month');
        $dateTo = (clone $dateFrom)->modify('+'.rand(1, 10).' days');

        // Calculate duration
        $duration = $dateFrom->diff($dateTo)->format('%a days');

        return [
            'course_id' => $course->id,
            'city_id' => $city->id,
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'date_from' => $dateFrom->format('Y-m-d'),
            'date_to' => $dateTo->format('Y-m-d'),
            'duration' => $duration,
            'lang' => $this->faker->randomElement(['en', 'ar']),
            'is_upcoming' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
