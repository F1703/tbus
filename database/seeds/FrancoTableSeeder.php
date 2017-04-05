<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use Faker\Factory;
use App\Franco;

class FrancoTableSeeder extends Seeder {

    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        factory(Franco::Class,100)->create();


        /*
        factory es el metodo que se encuentra en ModelFactory
        lo ejecutamos con
        php artisan db:seed --class=FrancoTableSeeder
        */
    }

}
