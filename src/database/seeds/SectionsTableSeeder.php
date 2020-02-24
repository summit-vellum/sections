<?php

use Illuminate\Database\Seeder;
use Quill\Sections\Models\Sections;

class SectionsTableSeeder extends Seeder
{
   	/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sections::class, 10)->create();
    }

}
