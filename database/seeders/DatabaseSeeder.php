<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\Department;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Department::truncate();
        Task::truncate();
        Schema::enableForeignKeyConstraints();

         $users = User::factory(10)->create();
         Department::factory(5)->create();
         Task::factory(5)->create();
        $users->where('role', UserTypeEnum::EMPLOYEE)->each(function ($user) {
            $department = Department::inRandomOrder()->first();
            if ($department) {
                $user->update(['department_id' => $department->id]);
            }
        });
    }
}
