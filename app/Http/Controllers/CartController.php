<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public static function count(Request $request){
        return $request->session()->all();
    }
}
?>