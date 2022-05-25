<?php

namespace Database\Seeders;

use App\Models\Emplyoee;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmplyoeeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Emplyoee::factory(30)->create();
    }
}
