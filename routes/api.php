<?php

use App\Http\Controllers\CategoryController as Cc;
use App\Http\Controllers\ArticleController as Ac;

$router->get('/',  function () {
    return ['pop','pip'];
});
$router->group(['prefix' => 'products'], function () use ($router) {
	$router->get('/',  function () {
    	return;
	});
	$router->get('/{category}',  function ($category) {
    	return Ac::getArticlesByCategory($category);
	});
});
$router->group(['prefix' => 'categories'], function () use ($router) {
	$router->get('/',  function () {
    	return Cc::getList();
	});
});
?>