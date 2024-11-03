<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\UserTypeEnum;
use App\Enums\StatusEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->name(),
            'status' => StatusEnum::values()[array_rand(StatusEnum::values())],
            'user_id' => User::ofRole(UserTypeEnum::EMPLOYEE->value)?->inRandomOrder()?->first()?->id
        ];
    }
}
