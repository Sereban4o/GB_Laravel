<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = new Category($this->getData());
        $category->save();
    }

    private function getData(): array
    {
        $quantity = 10;
        $categories = [];
        for ($i=0; $i <$quantity; $i++){
            $categories[]=[
                'title'=> fake()->jobTitle(),
                'description'=>fake()->text(100),
                'slug'=>fake()->slug,
                'created_at'=>now(),
            ];
        }
        return $categories;
    }
}
