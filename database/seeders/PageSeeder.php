<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create(['title' => 'Welcome' ,'content'=>'Welcome']);
        Page::create(['title' => 'Get Consultation' ,'content'=>'Get Consultation']);
    }
}
