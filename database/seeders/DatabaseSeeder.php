<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Master1;
use App\Models\Master2;
use App\Models\Doctorat;
use App\Models\Licence1;
use App\Models\Licence2;
use App\Models\Licence3;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(1)->create();
        Licence1::factory(100)->create();
        Licence2::factory(100)->create();
        Licence3::factory(100)->create();
        Master1::factory(10)->create();
        Master2::factory(10)->create();
        Doctorat::factory(10)->create();
    }
}
