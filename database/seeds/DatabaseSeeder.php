<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Maker;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('makers')->truncate();
        DB::table('users')->truncate();
        Model::unguard();

        $this->call('MakerSeed');
        $this->call('VehicleSeed');
        $this->call('UserSeed');
    }
}
