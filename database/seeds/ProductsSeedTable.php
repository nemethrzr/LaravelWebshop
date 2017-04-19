<?php

use Illuminate\Database\Seeder;

class ProductsSeedTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 100 ; $i++) { 
            $products[]=[
                'name'=>str_random(10),
                'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' ,
                'img'=>str_random(10),
                'price'=> round(random_int(10000, 30000)),
                'created_at'=>date_create(),
                'updated_at'=>date_create(),
                'category_id' => random_int(1, 6),

            ];
        }     
      
        DB::table('products')->insert($products);
    }
}
