<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Type::truncate();
        Schema::enableForeignKeyConstraints();

        $allType = [
            'HTML',
            'CSS',
            'JavaScript',
            'Vue',
            'SQL',
            'PHP',
            'Laravel',
        ];

        foreach ($allType as $singleType) {
            $type = Type::create([
                'title' => $singleType,
                'slug' => str() -> slug($singleType),
            ]);
        }
    }
}