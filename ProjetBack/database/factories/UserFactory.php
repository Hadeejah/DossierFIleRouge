<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $pass=["1234","12345","123456"];
        $index=array_rand($pass);
        $role=["Prof","RP","Attache","Etudiant"];
        $index1=array_rand($role);
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' =>$pass[$index], // password
            'remember_token' => Str::random(10),
            'role' => $role[$index1],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
