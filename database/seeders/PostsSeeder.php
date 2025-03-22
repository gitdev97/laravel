<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Truncate table before seeding (optional)
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create();
        $statuses = ['active', 'inactive', 'pending'];

        $records = [
            [
                'title' => 'Title 1',
                'status' => 'active',
                'notes' => 'Random note 1: Important'
            ],
            [
                'title' => 'Title 2',
                'status' => 'inactive',
                'notes' => 'Random note 2: Urgent'
            ],
            [
                'title' => 'Title 3',
                'status' => 'pending',
                'notes' => 'Random note 3: Optional'
            ],
            [
                'title' => 'Title 4',
                'status' => 'active',
                'notes' => 'Random note 4: Review Needed'
            ],
            [
                'title' => 'Title 5',
                'status' => 'inactive',
                'notes' => 'Random note 5: Important'
            ],
        ];

        // Insert predefined records
        foreach ($records as $record) {
            DB::table('posts')->insert([
                'title' => $record['title'],
                'status' => $record['status'],
                'content' => $faker->paragraphs(3, true),
                'notes' => $record['notes'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Insert additional random records
        for ($i = 6; $i <= 50; $i++) {
            DB::table('posts')->insert([
                'title' => 'Title ' . $i,
                'status' => $statuses[array_rand($statuses)],
                'content' => $faker->paragraphs(3, true),
                'notes' => 'Random note ' . $i . ': ' . $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
