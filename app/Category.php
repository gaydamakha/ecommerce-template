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
    private static function getAllCategoriesByParent($category){
        $categories=self::where('name','like',$category);
        if(!empty($categories)){
            foreach($categories as $cat){
                $categories[] = self::getCategoriesByParent($cat);
            }
        }
        return $categories;
    }
    // Relationships

}
