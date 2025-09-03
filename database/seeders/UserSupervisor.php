<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSupervisor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        User::updateOrCreate(
            ['email' => 'supervisor@gmail.com'],
            [   'name' => 'Supervisor',
                'role' => 'supervisor',
                'password' => bcrypt('Supervisor123'),
            ]
        );

        User::updateOrCreate(
        [
            'email' => 'admin@resturant.com',
            'name' => 'admin',
            'role' => 'admin',
            'password' => bcrypt('adminadmin123')    
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
