<?php

namespace Database\Factories;

use App\Models\Licence1;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licence1>
 */
class Licence1Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Licence1::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'sexe' => $this->faker->randomElement(['Masculin', 'Féminin']),
            'nationalite' => $this->faker->randomElement(['Cameroun', 'Burundi']),
            'email' => $this->faker->randomElement(['nodemborel78@gmail.com', 'lolmlol365@gmail.com']),
            'typebaccalaureat' => $this->faker->randomElement(['C', 'D', 'A4']),
            'moyenne' => $this->faker->randomFloat(2, 9, 20),
            'age' => $this->faker->numberBetween(15, 40),
            //'region' => $this->faker->unique()->city,
            'region' => $this->faker->randomElement(['Centre', 'Nord', 'Sud', 'Est', 'Ouest', 'Nord-Ouest', 'Nord-Est', 'Sud-Ouest', 'Sud-Est']),
            'nomEtb' => $this->faker->company,
            'numero' => $this->faker->randomElement(['677849391', '699524321', '123456789', '987654321','0123985213', '923401673']),
            'filiere' => $this->faker->randomElement(['ICT4D', 'Informatique', 'Mathématique']),
            'numActe' => $this->faker->ean13,
            'dateNaiss' => $this->faker->date,
            //$dateNaiss = $faker->date($format = 'Y-m-d', $max = '2003-01-01'),
            'lieuNaiss' => $this->faker->city,
            'langue' => $this->faker->randomElement(['Anglais', 'Français']),
            'adresse' => $this->faker->address,
            'anneebac' => $this->faker->numberBetween(2000, 2023),
            'delivBac' => $this->faker->randomElement(['OBC', 'GCE Board']),
            'acte_naissance' => $this->faker->randomElement(['1712985494R.pdf', '1712985494A.pdf']),
            'releve_bac' => $this->faker->randomElement(['1712985494R.pdf', '1712985494A.pdf']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
