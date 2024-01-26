<?php

namespace Database\Seeders;

use App\Models\Licence2;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Licence2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Licence2::factory(1000)->create();
    }
}
