<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            ['email' => "kos@gmail.com", 'name' => "kos", 'phone' => "123", 'password' => Hash::make("qwerty")],
        ]);
    }
}
