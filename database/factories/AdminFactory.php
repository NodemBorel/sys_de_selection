<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Admin::class;

    public function definition(): array
    {
        return [
            'firstName' => 'Imperial',
            'lastName' => 'Borel',
            'email' => 'emperialborel@gmail.com',
            //'password' => bcrypt('12345'),  Always hash passwords
            'password' => '12345',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
