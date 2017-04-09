<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsSeedTable::class);
		$this->call(ContentTableSeeder::class);

	  
    


    }
}
