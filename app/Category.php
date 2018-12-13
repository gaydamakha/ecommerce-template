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
    public static function getAllCategoriesByParent($category){
        $categories=self::where('name','like',$category);
        if(!empty($categories)){
            foreach($categories as $cat){
                $categories[] = self::getAllCategoriesByParent($cat);
            }
        }
        return $categories;
    }
    // Relationships

}
