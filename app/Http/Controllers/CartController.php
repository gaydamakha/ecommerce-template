<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public static function count(Request $request){
        //$request->session()->push('lol', '100');
        return response()->json($request->session()->get('lol'));
    }
}
?>