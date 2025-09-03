<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DevSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        User::updateOrCreate(
            [ 'email' => 'guest@gmail.com' ],
            [
                'name' => 'guest',
                'role' => 'guest',
                'password' => bcrypt('12345678'),
            ]
        );

        Schema::enableForeignKeyConstraints();
    }
}
