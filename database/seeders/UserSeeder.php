<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fullname = 'Jesus Fco Rodriguez';
        $email = 'jfcr@live.com';
        User::create([
            'customer_id' => 1,
            'name' => $fullname,
            'email' => $email,
            'password' => Hash::make('secret'),
        ]);

        Customer::create([
            'user_id' => 1,
            'first_name' => 'Jesus Fco',
            'last_name' => 'Rodriguez',
            'full_name' => $fullname,
            'email' => $email,            
        ]);
    }
}
