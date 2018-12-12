<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Facades\DB;
use PDO;
class CategoryController extends Controller
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public static function getCategoryContent($path)
	{
		$content = Category::select('id','name','path')
								->where('path','rlike',"^".$path.".[[:digit:]]$")
								->get();
		if(!empty($content)){
			foreach($content as $c){
				$c->categories=self::getCategoryContent($c['path']);
			}
		}
		return $content;
	}		
	public static function getList(){
		$categories = Category::select('id','name','path')
								->where('path','regexp','^[0-9]$')
								->get();
		foreach($categories as $cat){
			$cat->categories=self::getCategoryContent($cat['path']);
		}
    	return response()->json($categories);
	}
				
}