<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	Auth::attempt([
		'email' => 'jamie@gmail.com',
		'password' => 'password'
	]);
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('subscribed', function()
{
	if(Auth::check() && !Auth::user()->subscribed()) 
	{
		return Redirect::action('subscription')->with('notice', 'You need to be subscribed to do that.');
	}
});

Route::filter('not.subscribed', function()
{
	if(Auth::check() && Auth::user()->subscribed()) 
	{
		return Redirect::action('subscription');
	}
});

Route::filter('not.cancelled', function()
{
	if(Auth::check() && Auth::user()->cancelled()) 
	{
		return Redirect::action('subscription');
	}
});

Route::filter('cancelled', function()
{
	if(Auth::check() && !Auth::user()->cancelled()) 
	{
		return Redirect::action('subscription');
	}
});

Route::filter('plan.large', function()
{
	if(Auth::check() && !Auth::user()->onPlan('large')) 
	{
		return Redirect::action('subscription')->with('notice', 'You need to be on the big plan to access that.');
	}
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
