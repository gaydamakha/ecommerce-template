<?php
use App\Category;
use Illuminate\Database\Seeder;
class CategoryTableSeeder extends Seeder
{

    public function run() 
    {
        Category::create([
            "name" => "TVs",
            "path" => "1"
        ]);
        Category::create([
            "name" => "LG",
            "path" => "1.1"
        ]);
        Category::create([
            "name" => "LG-Ultra",
            "path" => "1.1.1"
        ]);
        Category::create([
            "name" => "Computers",
            "path" => "2"
        ]);
        Category::create([
            "name" => "Asus",
            "path" => "2.1"
        ]);

        Category::create([
            "name" => "Refrigerators",
            "path" => "3"
        ]);
        Category::create([
            "name" => "Beco",
            "path" => "3.1"
        ]);
    }
}
?>