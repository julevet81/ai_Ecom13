<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::where('slug', 'iphone-17')->first();
        if (!$product) {
            return;
        }
        ProductImage::create(      
            [
                'product_id' => $product->id,
                'image' => 'products/iphone17_1.jpg',
                'position' => 1,
                'alt_text' => 'Iphone 17 Front View',
                'status' => true,
            ]
        );
        
        ProductImage::create(
            [
                'product_id' => $product->id,
                'image' => 'products/iphone17_2.jpg',
                'position' => 2,
                'alt_text' => 'Iphone 17 Back View',
                'status' => true,
            ]
        );          
    }
}