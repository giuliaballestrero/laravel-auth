<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 30; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->unique()->realTextBetween(5, 30);
            $newProject->slug = Str::slug($newProject->title);
            $newProject->description = $faker->realText(100);
            $newProject->thumb = $faker->image();
            $newProject->creation_date = $faker->dateTimeThisYear();
            $newProject->type = $faker->realTextBetween(5,10);
            $newProject->completed = $faker->randomElement([true, false]);
            $newProject->save();
        }
    }
}
