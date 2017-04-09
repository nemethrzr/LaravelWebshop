<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
    	$categories = array(
    		['name'=>'Alaplap','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Processzor','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Videókártya','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Memória','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Hdd','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Hűtő','created_at'=>date_create(),'updated_at'=>date_create()]
    		);
        DB::table('categories')->insert($categories);
    }
}
