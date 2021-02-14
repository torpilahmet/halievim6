<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ahmet TORPİL',
            'email' => 'torpilahmet@gmail.com',
            'password' => bcrypt('password'),
        ]);
        User::factory()
            ->times(10)
            ->create();
    }
}
