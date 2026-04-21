<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            'fabric' => ['Cotton', 'Polyester', 'Wool'],
            'Sleeve' => ['Full Sleeve', 'Half Sleeve'],
            'pattern' => ['Solid', 'Printed'],
        ];

        foreach ($attributes as $name => $values) {
            $attribute = Attribute::create([
                'name' => ucfirst($name),
                'slug' => $name,
                'status' => true,
            ]);

            foreach ($values as $value) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value' => $value,
                ]);
            }
        }
    }
}