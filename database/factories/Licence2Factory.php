<?php

namespace Database\Factories;

use App\Models\Licence2;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Licence2>
 */
class Licence2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Licence2::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'sexe' => $this->faker->randomElement(['Masculin', 'Féminin']),
            'nationalite' => $this->faker->randomElement(['Cameroun', 'Congo']),
            'email' => $this->faker->randomElement(['nodemborel78@gmail.com', 'lolmlol365@gmail.com']),
            'typebaccalaureat' => $this->faker->randomElement(['C', 'D', 'A4']),
            'moyenne' => $this->faker->randomFloat(2, 9, 20),
            'age' => $this->faker->numberBetween(15, 40),
            'region' => $this->faker->randomElement(['Centre', 'Nord', 'Sud', 'Est', 'Ouest', 'Nord-Ouest', 'Nord-Est', 'Sud-Ouest', 'Sud-Est']),
            'nomEtb1' => $this->faker->company,
            'mgp1' => $this->faker->randomFloat(2, 1, 4),
            'numero' => $this->faker->randomElement(['677849391', '699524321', '123456789', '987654321','0123985213', '923401673']),
            'filiere' => $this->faker->randomElement(['ICT4D', 'Informatique', 'Mathématique']),
            'numActe' => $this->faker->ean13,
            'dateNaiss' => $this->faker->date,
            'lieuNaiss' => $this->faker->city,
            'langue' => $this->faker->randomElement(['Anglais', 'Français']),
            'adresse' => $this->faker->address,
            'delivBac' => $this->faker->randomElement(['OBC', 'GCE Board']),
            'provDiplome' => $this->faker->state,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
