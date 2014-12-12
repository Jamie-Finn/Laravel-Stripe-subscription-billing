Laravel-Stripe-subscription-billing
===================================

Using Laravel with Stripe for simple billing

Stripe API keys and Database configuration files not included due to sensitive information contained inside(Files not included are listed in the .gitignore file). I also haven't altered or added any files to the vendor folder that comes with Laravel. I just didn't push it to the repository as it is not needed and comes when you install Laravel anyway.

Laravel Cashier is required in the composer.json file
======================================================

```
"require": {
	"laravel/framework": "4.2.*",
	"laravel/cashier": "2.0.4"
	},
```

You also have to add it to the providers array in app/config/app.php 

```
'Laravel\Cashier\CashierServiceProvider'
```

Then run composer update in a terminal such as Git Bash.

Configure your database settings in the app/config/database.php file
====================================================================

This file is not included in this project for the reasons stated above that it contains sensitive details but is included when you install Laravel.

```
'mysql' => array(
	'driver'    => 'mysql',
	'host'      => 'HOST NAME GOES HERE',
	'database'  => 'DATABASE NAME GOES HERE',
	'username'  => 'USERNAME GOES HERE',
	'password'  => 'PASSSWORD GOES HERE',
	'charset'   => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix'    => '',
),
```

Inserting your Stripe API keys
==============================

Your Stripe API keys go in the app/config/services.php file. If you have worked with Stripe before you will be aware that there is a live key and a test key. The test key goes in the services.php file located in your local folder in app/config/local.

```
return array(
	
	'stripe' => array(
		'model'  => 'User',
		'secret' => 'YOUR TEST KEY GOES HERE',
	),

);
```

This file will probably need to be created as it will not automatically be included with Laravel.

The services.php file for production purposes should already be included with Laravel. The procedure is the same as before where you enter your Stripe API key in the array but this time it is the live key.

```
'stripe' => array(
	'model'  => 'User',
	'secret' => 'YOUR LIVE KEY GOES HERE',
),

