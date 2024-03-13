<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Tag;

use Illuminate\Support\Facades\Schema;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Tag::truncate();
        Schema::enableForeignKeyConstraints();

        $allTag = [
            'Web',
            'Software',
            'Hardware',
            'Blockchain',
            'Ai',
            'Machine Learning',
            'ChatGpt',
        ];

        foreach ($allTag as $singleTag) {
            $tag = Tag::create([
                'title' => $singleTag,
                'slug' => str() -> slug($singleTag),
            ]);
        }
    }
}
