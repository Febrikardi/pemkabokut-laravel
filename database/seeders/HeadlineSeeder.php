<?php

namespace Database\Seeders;

use App\Models\Headline;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headlines = [
            ['title' => 'Headlines OKU Timur'],
            ['title' => 'Data Umum']
        ];

        foreach ($headlines as $headline) {
            Headline::create($headline);
        }
    }
}
