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
        factory(\App\User::class)->create([
            'email'         => 'me@alfrednutile.info',
            'password'      => bcrypt(env('ADMIN_PASSWORD', str_random(16)))
        ]);
    }
}
