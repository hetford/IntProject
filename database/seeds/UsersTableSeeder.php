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
            'name' => 'John Smith',
            'email' => 'John.Smith@email.com',
            'role' => 'Author',
            'password' => bcrypt('password'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Katie Fitzpatrick',
            'email' => 'KTFP2@email.com',
            'role' => 'User',
            'password' => bcrypt('password2'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'role' => 'System Admin',
            'password' => bcrypt('admin'),
        ]);
    }
}
