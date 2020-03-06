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
    	$old_db = DB::connection('olddb');
    	dd(DB::connection()->getPdo());
        //factory(Sections::class, 10)->create();
    }

}
