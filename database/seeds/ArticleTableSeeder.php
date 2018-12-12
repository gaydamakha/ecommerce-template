<?php
use App\Article;
use Illuminate\Database\Seeder;
class ArticleTableSeeder extends Seeder
{
    public function run() 
    {
        Article::create([
            "name" => "SG-868",
            "category" => "LG",
            "price"=> 50
        ]);
        Article::create([
            "name" => "Leeha",
            "category" => "TVs",
            "price"=> 60
        ]);
        Article::create([
            "name" => "HU-777",
            "category" => "LG",
            "price"=> 70
        ]);
        Article::create([
            "name" => "Dno-desktop",
            "category" => "Computers",
            "price"=> 9
        ]);
        Article::create([
            "name" => "Huyasus",
            "category" => "Asus",
            "price"=> 90
        ]);

        Article::create([
            "name" => "PO-999",
            "category" => "Asus",
            "price"=> 1100
        ]);
        Article::create([
            "name" => "Selfish",
            //without category
            "price"=> 10000
        ]);
    }
}
?>