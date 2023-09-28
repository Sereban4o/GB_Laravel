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
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        return [
            [
                'title' => 'Спорт',
                'description' => 'Новости спорта',
                'slug'=>'sport',
                'created_at' => now(),
            ],
            [
                'title' => 'Политика',
                'description' => 'Новости политики',
                'slug'=>'politic',
                'created_at' => now(),
            ],            [
                'title' => 'Развлечения',
                'description' => 'Новости развлечения',
                'slug'=>'game',
                'created_at' => now(),
            ],

        ];
    }
}
