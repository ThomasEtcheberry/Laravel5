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
        $product = new App\Product([
        	'image' => 'https://assets.academy.com/mgen/50/20013050.jpg?is=500,500',
        	'title' => 'Sweet Rose',
        	'description' => 'Un super sweet rose',
        	'price' => 35
    	]);
    	$product->save();

    	$product = new App\Product([
        	'image' => 'https://assets.academy.com/mgen/95/10820595.jpg?is=500,500',
        	'title' => 'Sweet Nike',
        	'description' => 'Un super sweet Nike',
        	'price' => 50
    	]);
    	$product->save();

    	$product = new App\Product([
        	'image' => 'https://assets.academy.com/mgen/89/20049189.jpg?is=500,500',
        	'title' => 'Sweet Adidas',
        	'description' => 'Un super sweet Adidas',
        	'price' => 45
    	]);
    	$product->save();

    	$product = new App\Product([
        	'image' => 'https://assets.academy.com/mgen/48/20001948.jpg?is=500,500',
        	'title' => 'Short Nike',
        	'description' => 'Un super short Nike',
        	'price' => 30
    	]);
    	$product->save();

    	$product = new App\Product([
        	'image' => 'https://www.everythingdinosaur.com/wp-content/uploads/2017/02/apprentice_palaeontologist_tee-500x500.jpg',
        	'title' => 'Sweet dinosaure',
        	'description' => 'Un super sweet dinosaure',
        	'price' => 20
    	]);
    	$product->save();
    }
}
