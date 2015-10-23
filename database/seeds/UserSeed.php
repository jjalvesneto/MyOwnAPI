<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

use Faker\Factory as Faker;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker::create();
        
        for ($i=0; $i < 6 ; $i++)
        { 
             User::create
            ([
                'email' => $faker-> email(),
                'password' => Hash::make('pass')
            ]);
        }
    }
}
