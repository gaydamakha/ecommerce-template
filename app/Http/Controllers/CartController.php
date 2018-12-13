<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Article;

class CartController extends Controller
{
    public static function count(Request $request){
        if($request->session()->has('cart_count'))
            return response()->json(['count'=>$request->session()->get('cart_count')]);
        else
            return response()->json(['count' => 0]);
    }
    public static function addToCart(Request $request,$article_id){
        $article = Article::where('id',$article_id)
                            ->get();
        if(!empty($article)){
            $count=0;
            if($request->session()->has('cart_count'))
                $count=$request->session()->get('cart_count');
            $count=$count+1;
            $request->session()->put('cart_count',$count);     
        }
        return response()->json(['message'=>'OK chigagok']);
    }
}