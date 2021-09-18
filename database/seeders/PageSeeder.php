<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pages;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Pages::factory()->count(10)->create(); 
    }
}
