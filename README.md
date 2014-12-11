Laravel-Stripe-subscription-billing
===================================

Using Laravel with Stripe for simple billing

Stripe API keys and Database configuration files not included due to sensitive information contained inside(Files not included are listed in the .gitignore file).

Laravel Cashier is required in the composer.json file
======================================================

```
"require": {
	"laravel/framework": "4.2.*",
	"laravel/cashier": "2.0.4"
	},
```

You also have to add it the the providers array in app/config/app.php 

```
'Laravel\Cashier\CashierServiceProvider'
```

Then run composer update in a terminal such as Git Bash.