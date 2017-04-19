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
    		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'sort'=>random_int(0, 3),
            'slug'=>'fooldal',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Elérhetőség',
    		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'sort'=>random_int(0, 3),
            'slug'=>'elerhetoseg',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Vendégkönyv',
    		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'sort'=>random_int(0, 3),
            'slug'=>'vendegkonyv',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		[
    		'menu'=>'Kapcsolat',
    		'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
    		'sort'=>random_int(0, 3),
            'slug'=>'kapcsolat',
    		'created_at'=>date_create(),
    		'updated_at'=>date_create()],
    		
    		);
        DB::table('contents')->insert($contents);
    }
}
