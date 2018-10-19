<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
          'name'=>'Charlie',
          'email'=>'charlie_visser@outlook.com',
          'password'=>bcrypt('Test123')
        ])
    }
}
