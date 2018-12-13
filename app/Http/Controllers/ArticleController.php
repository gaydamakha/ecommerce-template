<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\DB;
use PDO;
class ArticleController extends Controller
{
    public static function getArticlesByCategory($category){
        $categories = Category::getAllCategoriesByParent($category);
        // echo implode('|',$categories);
        $articles = Article::select('name','category','price','avalaible')
								->where('category','in',$categories)
                                ->get();
        return response()->json($articles);
    }
}
?>