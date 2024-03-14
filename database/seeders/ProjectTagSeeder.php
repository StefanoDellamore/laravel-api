<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//models
use App\Models\Project;
use App\Models\Tag;

class ProjectTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects =Project::all();

        foreach ($projects as $project){
            $tags = Tag::inRandomOrder()->get();

            $counter = 0;
            $maxTags = rand(0, 2);
            foreach($tags as $tag) {
                if($counter < $maxTags) {
                    $project->tag()->attach($tag->id);
                    $counter++;
                }
                else{
                    break;
                }
            }
        }
    }
}
