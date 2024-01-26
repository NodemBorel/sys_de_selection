<?php

namespace Database\Seeders;

use App\Models\Licence3;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Licence3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Licence3::factory(1000)->create();
    }
}
