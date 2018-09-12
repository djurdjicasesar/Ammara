<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product=new\App\Product([
		'image'=>'product_images',
		'description'=>'kkkk',
		'price'=>20.' kn',
		]);
		$product->save();
    }
}
