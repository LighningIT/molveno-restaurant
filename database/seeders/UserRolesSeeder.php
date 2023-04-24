<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserRoles;

class UserRolesSeeder extends Seeder
{
    protected $roles = ["waiter", "kitchen", "reception", "chef", "sousChef", "admin", "owner"];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach($this->roles as $role) {
            UserRoles::factory()->create([
                'role' => $role
            ]);
        }
    }
}
