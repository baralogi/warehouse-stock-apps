<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\User::class, 3)->create();
        $admin1 = User::create([
            'name' => 'Bastian',
            'email' => 'sembara9090@gmail.com',
            'password' => bcrypt('mypassword'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $admin2 = User::create([
            'name' => 'Ryan',
            'email' => 'ryan@gmail.com',
            'password' => bcrypt('mypassword'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $admin1->assignRole('admin');
        $admin2->assignRole('staff');

    }
}
