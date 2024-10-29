<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $image = [
            'https://img.drz.lazcdn.com/g/kf/S98cf6f06502f41e2954c03ee6b899703c.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/Sf21ef75fd6564351927d32f674bd5faco.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/Seea5a9e8b9544870936398ef8b17b18fF.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/ccc1550567f6840e1a977ade058f2224.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S10bba67abb1b4ce6b040adaf4e5071fbs.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/907d04a84bd038625dbdd0d928432659.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S85ac38b192fc4da78470031094bccdee5.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S48d4468c6d944b3f97a157e0cb36c5a1t.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/f63902df8bb7c54d9b9c94890483af3b.png_200x200q80.png_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/798f70c1a512305d8ecbce11220ed2ce.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/61b772c8dc208e0b6ca7c015e1da1c1c.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S397be587e56a4a3aad958cfcb32f36d9g.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/34b4f7eac0ebe4ce841c051612571c6f.png_200x200q80.png_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/c468bbb40648c17a4d03a2aa478e4e37.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/ccad665734f39e1d3f67d9aadb2affb2.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S66dd2a4846a3402a920aa8819aa24cd79.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/Sb6c3e6b21df545599f2c18d1454e80dey.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S6c26502a30c845dcbd019aba7c3f5895j.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S8375b387396d46eaa433a2619c429c76A.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/4fffcbf375a3255313441209643932ed.jpg_200x200q80.jpg_.webp',

        ];

        for ($i = 1; $i <= 100; $i++) { // Generate 10 products
            Product::create([
                'name' => $faker->words(3, true),
                'slug' => Str::slug($faker->unique()->words(3, true)),
                'category_id' => $faker->numberBetween(1, 10),
                'short_description' => $faker->sentence(),
                'long_description' => $faker->paragraph(),
                'regular_price' => $faker->randomFloat(2, 10, 100),
                'selling_price' => $faker->randomFloat(2, 5, 90),
                'image' => $image[rand(0,10)],
                'images' => json_encode([$faker->imageUrl(640, 480, 'products'), $faker->imageUrl(640, 480, 'products')]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
