<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Course;
use App\Models\Timing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            // CitiesTableSeeder::class,
            // MetaSeeder::class
        ]);

        // Blog::factory()->count(10)->create();
        Course::factory()->count(10)->create();
        // Timing::factory()->count(10)->create();

        // ContactUs::create([
        //     'full_name' => 'Reham Shaban',
        //     'country' => 'Syria',
        //     'email' => 'reham@email.com',
        //     'company' => 'company',
        //     'subject' => 'subject',
        //     'message' => 'some message',
        //     'phone_number' => '+999999999'
        // ]);

        // ContactUs::create([
        //     'full_name' => 'Maysam Shaban',
        //     'country' => 'Syria',
        //     'email' => 'maysam@email.com',
        //     'company' => 'company',
        //     'subject' => 'subject',
        //     'message' => 'some message',
        //     'phone_number' => '+999999999'
        // ]);
    }
}
