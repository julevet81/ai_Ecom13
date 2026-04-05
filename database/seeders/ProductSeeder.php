<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $category = Category::where('slug', 'electronics')->first();
        if (!$category) {
            return;
        }
            
        Product::create([
            'category_id'      => $category->id,
            'name'             => 'Iphone 17',
            'slug'             => 'iphone-17',
            'description'      => 'Latest Apple smartphone with advanced features.',
            'price'            => 699.99,
            'sale_price'       => 649.99,
            'sku'              => 'IPHONE17-BLK-128GB',
            'stock'            => 50,
            'image'            => 'products/smartphone_xyz.jpg',
            'featured'         => true,
            'status'           => true,
            'meta_title'       => 'Buy Iphone 17 Online',
            'meta_description' => 'Get the latest Iphone 17 with amazing features at a great price.',
            'meta_keywords'    => 'smartphone, electronics, mobile, Iphone',
        ]);
                
        Product::create([
            'category_id'      => $category->id,
            'name'             => 'Samsung Galaxy S36',
            'slug'             => 'samsung-galaxy-s36',
            'description'      => 'Samsung Galaxy S36 smartphone with impressive features.',
            'price'            => 1199.99,
            'sale_price'       => 1099.99,
            'sku'              => 'LPABC456',
            'stock'            => 30,
            'image'            => 'products/Samsung_Galaxy_S36.jpg',
            'featured'         => false,
            'status'           => true,
            'meta_title'       => 'Buy Samsung Galaxy S36 Online',
            'meta_description' => 'Discover the performance of Samsung Galaxy S36 for all your computing needs.',
            'meta_keywords'    => 'smartphone, electronics, mobile, Samsung',
       ]);
            
    }       
}