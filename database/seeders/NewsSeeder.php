<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = new News($this->getData());
        $news->save();
    }

    private function getData(): array
    {
        $quantity = 30;
        $news = [];
        for ($i=0; $i <$quantity; $i++){
            $news[]=[
                'category_id'=>fake()->randomNumber(1, 10),
                'author'=>fake()->userName,
                'image'=>fake()->imageUrl(200, 150),
                'status'=>Status::ACTIVE->value,
                'title'=> fake()->jobTitle(),
                'description'=>fake()->text(200),
                'created_at'=>now(),
            ];
        }
        return $news;
    }
}
