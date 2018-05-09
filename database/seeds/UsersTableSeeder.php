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
        	'name'=>'NgaLe',
        	'email'=>'ngaa1leloi@gmail.com',
        	'password'=>bcrypt('12345678')]);
    }
}
