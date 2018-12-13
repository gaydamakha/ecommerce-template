<?php

use App\Http\Controllers\CategoryController as Cc;
use App\Http\Controllers\ArticleController as Ac;

$router->get('/',  function () {
    return ['pop','pip'];
});
$router->group(['prefix' => 'products'], function () use ($router) {
	$router->get('/',  function () {
    	return Ac::getAll();
	});
	$router->get('/{category_id}',  function ($category_id) {
    	return Ac::getArticlesByCategory($category_id);
	});
});
$router->group(['prefix' => 'categories'], function () use ($router) {
	$router->get('/',  function () {
    	return Cc::getList();
	});
});
?>