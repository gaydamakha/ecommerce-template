<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
	
    protected $categories = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];
    private static function getCategoriesByParent($category,$arrayToAdd){
        $categories=self::where('name','like',$category);
        if(!empty($categories)){
            foreach($categories as $cat){
                $arrayToAdd[] = self::getCategoriesByParent($cat,$arrayToAdd);
            }
        }
        return $arrayToAdd;
    }
    public static function getAllCategoriesByParent($category){
        $categories = array();
        $categories[] = self::getCategoriesByParent($category,$categories);
        return $categories;
    }
    // Relationships

}
