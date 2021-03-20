<?php

namespace Database\Seeders;

use App\Models\Icone;
use Illuminate\Database\Seeder;

class IconeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Icone::factory()->count(20)->create();
    }
}
