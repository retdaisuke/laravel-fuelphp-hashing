# laravel-fuelphp-hashing
Laravel hashing for migration from FuelPHP hashed password.


## Install (Laravel5.1~)

Add the package to your composer.json and run composer update.

```json
"require": {
    "retdaisuke/laravel-fuelphp-hashing": "^1.0"
},
```

Or install with composer.

```sh
$ composer require retdaisuke/laravel-fuelphp-hashing
```

Change the service provider in config/app.php:

```php
//Illuminate\Hashing\HashServiceProvider::class,
Retdaisuke\LaravelFuelphpHashing\HashServiceProvider::class,
```

Create fuelphp config files. config/fuelphp.php

```php
<?php
return [
    'auth' => [
        'salt' => env('FUELPHP_AUTH_SALT', ''),
        'iterations' => env('FUELPHP_AUTH_ITERATIONS', 10000),
    ],
];
```

.env file.

```
FUELPHP_AUTH_SALT=xxxxxxxxxxxxxxxxx
```
