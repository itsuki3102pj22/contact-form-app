<?php

namespace Database\Factories;

use App\Models\ContactForm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactForm>
 */
class ContactFormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => mb_substr($this->faker->name(), 0, 50),
            'title' => $this->faker->realText(50),
            'email' => $this->faker->email(),
            'url' => $this->faker->url(),
            'gender' => $this->faker->boolean(),
            'age' => $this->faker->numberBetween(1, 6),
            'contact' => $this->faker->realText(200),
        ];
    }
}
