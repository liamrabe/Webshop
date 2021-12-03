<?php

// Exceptions
use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\Exceptions\HttpException;

// Controllers
use Controller\APIController;

// Various
use Pecee\SimpleRouter\SimpleRouter as Route;

try {
	Route::group(['prefix' => '/api'], function() {
		Route::group(['prefix' => '/v1'], function() {
			Route::get('/numbers/{min}/{max}/{items}', [APIController::class, 'test']);
		});
	});

	Route::start();
}
catch (TokenMismatchException|NotFoundHttpException|HttpException|Exception $ex) {}