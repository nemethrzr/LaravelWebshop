<?php

use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = array(
    		[
    		'menu'=>'Főoldal',
    		'description'=>str_random(200),
    		'sort'=>random_int(0, 3),
            'slug'=>'fooldal',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Elérhetőség',
    		'description'=>str_random(200),
    		'sort'=>random_int(0, 3),
            'slug'=>'elerhetoseg',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Vendégkönyv',
    		'description'=>str_random(200),
    		'sort'=>random_int(0, 3),
            'slug'=>'vendegkonyv',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Kapcsolat',
    		'description'=>str_random(200),
    		'sort'=>random_int(0, 3),
            'slug'=>'kapcsolat',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		
    		);
        DB::table('contents')->insert($contents);
    }
}
