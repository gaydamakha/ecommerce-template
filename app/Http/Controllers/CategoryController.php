<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Response;
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

	public static function getList(){
		$categories = Category::select('id','name')
								->where('path','rlike','^[0-9]$')
								->get();
    	return response()->json(array('categories' => $categories));
	}
	public static function getCategoryContent($path)
	{
		$content = Category::select('id','name')
								->where('path','like',$path.'_%')
								->get();
		return response()->json(array('data' => $content));
	}					
}