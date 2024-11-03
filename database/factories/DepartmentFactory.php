<?php

namespace Database\Factories;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
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
            'manager_id' => User::ofRole(UserTypeEnum::MANAGER->value)?->inRandomOrder()?->first()?->id
        ];
    }
}
