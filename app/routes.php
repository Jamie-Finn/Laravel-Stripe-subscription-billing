<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	
});

/*
/ Authorized user group before they can join/subscribe
*/
Route::group(['prefix' => 'subscription', 'before' => 'auth'], function() {
	Route::get('/', [
		'as' => 'subscription',
		'uses' => 'SubscriptionController@getIndex'
	]);

	Route::group(['before' => 'not.subscribed'], function() 
	{
		Route::get('join', [
			'as' => 'subscription-join',
			'uses' => 'SubscriptionController@getJoin'
		]);

		Route::post('join', [
			'before' => 'csrf',
			'uses' => 'SubscriptionController@postJoin'
		]);
	});

	/* 
	/ Subscribed group
	*/
	Route::group(['before' => 'subscribed'], function() {
		Route::get('cancel', [
			'before' => 'not.cancelled|csrf',
			'as' => 'subscription-cancel',
			'uses' => 'SubscriptionController@getCancel'
		]);

		Route::get('resume', [
			'before' => 'cancelled|csrf',
			'as' => 'subscription-resume',
			'uses' => 'SubscriptionController@getResume'
		]);

		Route::get('card', [
			'as' => 'subscription-card',
			'uses' => 'SubscriptionController@getCard'
		]);

		Route::post('card', [
			'before' => 'csrf',
			'uses' => 'SubscriptionController@postCard'
		]);
	});
});

/*
/ Authorized and Subscribed group
*/
Route::group(['before' => 'auth|subscribed'], function() {
	Route::get('/protected', function() 
	{
		echo 'Subscribed only';
	});

	Route::group(['before' => 'plan.large'], function() 
	{
		Route::get('/large', function() 
		{
			echo 'Large only';
		});	
	});	
});

Route::post('webhook/stripe', 'Laravel\Cashier\WebhookController@handleWebhook');
