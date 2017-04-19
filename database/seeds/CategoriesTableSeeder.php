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
    		['name'=>'Alaplap','slug'=>'alaplap','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Processzor','slug'=>'processzor','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Videókártya','slug'=>'videokartya','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Memória','slug'=>'memoria','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Hdd','slug'=>'hdd','created_at'=>date_create(),'updated_at'=>date_create()],
    		['name'=>'Hűtő','slug'=>'huto','created_at'=>date_create(),'updated_at'=>date_create()]
    		);
        DB::table('categories')->insert($categories);
    }
}
