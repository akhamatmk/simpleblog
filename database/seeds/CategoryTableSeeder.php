<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

            DB::table('categories')->insert([

                [
                    'name' => 'Beauty',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423796/category-1-400x250_bwtgpn.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sport',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423795/category-2-400x250_dyerap.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Health',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423802/category-3-400x250_qrtwk3.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Design',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423795/category-4-400x250_eu0gfj.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Music',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423795/category-5-400x250_e5schf.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Movie',
                    'image' => 'http://res.cloudinary.com/kodami/image/upload/v1531423796/category-6-400x250_ziowyl.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);        

    }
}