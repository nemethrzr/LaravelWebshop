<?php

use Illuminate\Database\Seeder;

class ShippingMethodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shipping=[
        	[
	        	'name'=>'Házhozszállítássaé',
	        	'description'=>'Házhozszállítássaé leírása',
	        	'price'=>1500,
	        	'enabled'=>true,
	        	'created_at'=>date_create(),
	        	'updated_at'=>date_create()
        	],
        	[
	        	'name'=>'Személyesátvétel',
	        	'description'=>'Személyes slkdkk leírása',
	        	'price'=>0,
	        	'enabled'=>true,
	        	'created_at'=>date_create(),
	        	'updated_at'=>date_create()
        	]
        ];

        DB::table('shipping_methods')->insert($shipping);
    }
}
