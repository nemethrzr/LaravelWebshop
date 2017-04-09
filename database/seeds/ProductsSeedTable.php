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
       $products = array(
    		[
    		'name'=>str_random(10),
    		'description'=>str_random(200),
    		'img'=>str_random(10),
    		'price'=> round(random_int(10000, 30000)),
    		'created_at'=>date_create(),
    		'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

    		],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ],
            [
            'name'=>str_random(10),
            'description'=>str_random(200),
            'img'=>str_random(10),
            'price'=> round(random_int(10000, 30000)),
            'created_at'=>date_create(),
            'updated_at'=>date_create(),
            'category_id' => random_int(1, 30),

            ]
            );
        DB::table('products')->insert($products);
    }
}
