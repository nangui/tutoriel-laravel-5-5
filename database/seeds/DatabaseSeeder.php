<?php

use Illuminate\Database\Seeder;
use App\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Todo::class, 50)->create();
    }
}
