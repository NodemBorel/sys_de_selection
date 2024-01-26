<?php

namespace Database\Seeders;

use App\Models\Licence1;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Licence1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Licence1::factory(1000)->create();
    }
}
