<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            Post::create([
                'title' => $faker->text('20'),
                'description' => $faker->text(50),
            ]);
        }
    }
}
