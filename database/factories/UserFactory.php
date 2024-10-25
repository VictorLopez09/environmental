<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(), // Genera un nombre de usuario único
            'first_name' => fake()->firstName(), // Genera un primer nombre
            'last_name' => fake()->lastName(), // Genera un apellido
            'email' => fake()->unique()->safeEmail(), // Genera un correo electrónico único
            'email_verified_at' => now(), // Establece la fecha de verificación del correo electrónico
            'password' => static::$password ??= Hash::make('password'), // Genera una contraseña hasheada
            'remember_token' => Str::random(10), // Genera un token aleatorio para recordar al usuario
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
