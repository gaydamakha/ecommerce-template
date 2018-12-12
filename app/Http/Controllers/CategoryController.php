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

	public static function getList(){
		$categories = array(Category::select('id','name','path')
								->where('path','rlike','^[0-9]$')
								->get());
		foreach($categories as $cat){
			$cat->fillable=$this->getCategoryContent($cat->path);
		}
    	return response()->json($categories);
	}
	public static function getCategoryContent($path)
	{
		$content = array(Category::select('id','name','path')
								->where('path','like',$path.'.%')
								->get());
		if(!empty($content))
			foreach($content as $c)
				$c->fillable=$this->getCategoryContent($c->$path);


		return $content; 

	}					
}