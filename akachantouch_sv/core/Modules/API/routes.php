<?php 
Route::group(['prefix' => 'api',
			  'namespace' => 'Core\Modules\API\Controllers',
			  'middleware' => 'api',
			  'guard' => 'api',
], function() {
    Route::group(['prefix' => 'auth' ], function() {
    	Route::post('login', 'AuthController@login');
    });
    
    Route::group(['middleware' => 'auth:api'], function() {
    	    Route::get('me', 'AuthController@me')->middleware('last.login');
    	    Route::post('me', 'AuthController@updateUser');
            Route::post('purchase', 'PurchaseController@post');
    });
});

 ?>