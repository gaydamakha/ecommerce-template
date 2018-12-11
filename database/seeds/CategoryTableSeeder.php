<?php
use App\Category;
use Illuminate\Database\Seeder;
class CategoryTableSeeder extends Seeder
{
//    DB_DSN="mysql:host=40.79.21.117;dbname=pw2"

    public function run() 
    {
        Category::create([
            "name" => "TVs",
            //"number" => 1,
            "path" => "1"
        ]);
        Category::create([
            "name" => "LG",
            //"number" => 1,
            "path" => "1.1"
        ]);
        Category::create([
            "name" => "LG-Ultra",
            //"number" => 1,
            "path" => "1.1.1"
        ]);
        Category::create([
            "name" => "Computers",
            //"number" => 2,
            "path" => "2"
        ]);
        Category::create([
            "name" => "Asus",
            //"number" => 1,
            "path" => "2.1"
        ]);

        Category::create([
            "name" => "Refrigerators",
            //"number" => 3,
            "path" => "3"
        ]);
        Category::create([
            "name" => "Beco",
            //"number" => 3,
            "path" => "3.1"
        ]);
    }
}
?>