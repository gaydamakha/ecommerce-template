<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
	
    protected $fillable = [];

    protected $dates = [];

    protected $path = "";

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
