<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            'https://img.drz.lazcdn.com/static/bd/p/55902caffd4c915dc7814a1687ce88b3.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/34b4f7eac0ebe4ce841c051612571c6f.png_200x200q80.png_.webp',
            'https://img.drz.lazcdn.com/static/bd/p/8839f7d1d458c51ac22657fb48a234c5.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S7dfa17500dda4f9d837856ed60e05903W.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S397be587e56a4a3aad958cfcb32f36d9g.jpg_200x200q80.jpg_.webp',
            'https://img.drz.lazcdn.com/g/kf/S10bba67abb1b4ce6b040adaf4e5071fbs.jpg_200x200q80.jpg_.webp',
        ];
        $categories = [
            'Shoes & Bags',
            'Blouses & Shirts',
            'Dresses',
            'Swimwear',
            'Beauty',
            'Jewelry & Watch',
            'Accessories',
            'Home & Kitchen',
            'Electronics',
            'Sports & Outdoors',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category,  '-'),
                'image' => $images[rand(0,5)],
                'status' => rand(0,1),
            ]);
        }


    }
}
