<?php

use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            KriteriaTableSeeder::class,
            MahasiswaTableSeeder::class,
            SubKriteriaTableSeeder::class,
            RoleTableSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
