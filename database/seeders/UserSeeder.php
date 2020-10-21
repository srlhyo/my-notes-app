<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Test',
            'email'     => 'test@test.com',
            'password'  => Hash::make('123456')
        ]);

        $user = User::create([
            'name'      => 'Test2',
            'email'     => 'test2@test.com',
            'password'  => Hash::make('12345678')
        ]);
    }
}
