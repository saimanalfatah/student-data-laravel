<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'name'              => 'Admin',
            'email'             => 'admin@mail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('admin123'),
            'remember_token'    => Str::random(10),
            'level'             => 'admin',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name'              => 'Operator',
            'email'             => 'operator@mail.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('operator123'),
            'remember_token'    => Str::random(10),
            'level'             => 'operator',
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now()
        ]);
        
        $user = factory(\App\User::class, 5)->create();
    }
}
