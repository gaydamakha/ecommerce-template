<?php

use App\Http\Controllers\CategoryController as cc;

$router->get('/',  function () {
    return ['pop','pip'];
});
$router->group(['prefix' => 'categories'], function () use ($router) {
	$router->get('/',  function () {
    	return cc::getList();
	});
	$router->get('/{path}',  function ($path) {
   		return cc::getCategoryContent($path);
	});
});
?>