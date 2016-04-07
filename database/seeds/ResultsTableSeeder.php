<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(App::environment() !== 'production')
            factory(\App\Result::class, 200)->create();


    }
}
