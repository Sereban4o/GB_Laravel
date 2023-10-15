<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $urls = [['link'=>'https://lenta.ru/rss'],
            ['link'=>'https://news.rambler.ru/rss/Petrozavodsk/'],
        ];

        DB::table('resources')->insert($urls);
    }



}
