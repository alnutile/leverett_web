<?php

use App\User;
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
        $user = new User();
        $user->email = 'me@alfrednutile.info';
        $user->password = bcrypt(env('ADMIN_PASSWORD', str_random(16)));
        $user->name = "Alfred Nutile";
        $user->save();

    }
}
