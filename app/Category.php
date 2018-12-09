<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';
	
    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
