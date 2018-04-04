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
        DB::table('users')->insert([
            'name'           => 'Daan de Boer',
            'email'          => 'daan227@gmail.com',
            'password'       => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        DB::table('users')->insert([
            'name'           => 'Rob Bekker',
            'email'          => 'rob.bekker@gmail.com',
            'password'       => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);

        factory(App\User::class, 8)->create();
    }
}
