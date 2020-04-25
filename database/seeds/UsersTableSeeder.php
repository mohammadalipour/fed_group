<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        User::create([
            'email' => 'md.alipour91@gmail.com',
            'password' => Hash::make('123456'),
            'name' => 'Administrator'
        ]);
    }
}
