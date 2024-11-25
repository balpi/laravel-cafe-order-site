<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            Db::table('categories')->insert([

                'Title' => Str::random(10),
                'Keywords' => Str::random(10),
                'Description' => Str::random(10),
                'Image' => Str::random(10),
                'Status' => 1,
                'maincategories_ID' => 1



            ]);


        }



    }
}
