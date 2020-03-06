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

    	$itemsPerBatch = 50;

    	$channels = $old_db->table('tbl_channels');

    	$this->command->getOutput()->progressStart($channels->count());

    	$sections = $channels->orderBy('channels_id')->chunk($itemsPerBatch, function($sections){

    		foreach ($sections as $section) {

    			$migratedSection = new Sections;
    			$migratedSection->create([
    				'id' => $section->channels_id,
    				'parent_id' => $section->channels_parent_id,
    				'slug' => $section->channels_slug,
    				'url' => $section->channels_url,
    				'name' => $section->channels_name,
    				'title' => $section->channels_title,
    				'description' => $section->channels_description,
    				'keywords' => $section->channels_keywords,
    				'order' => $section->channels_order,
    				'status' => $section->channels_status,
    				'created_at' => $section->channels_date_created,
    				'updated_at' => $section->channels_date_modified

    			]);

        		$this->command->getOutput()->progressAdvance();
    		}

    	});

    	$this->command->getOutput()->progressFinish();
    }

}
