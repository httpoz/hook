[![Build Status](https://travis-ci.org/httpoz/hook.svg)](https://travis-ci.org/httpoz/hook)
[![codecov](https://codecov.io/gh/httpoz/hook/branch/master/graph/badge.svg)](https://codecov.io/gh/httpoz/hook)
[![Total Downloads](https://poser.pugx.org/httpoz/hook/d/total.svg)](https://packagist.org/packages/httpoz/hook)


# Installation

### Composer
Add the package to your project via composer.
```
composer require httpoz/hooks
```

### Publish
Run this to publish the package's migrations
```
php artisan vendor:publish --provider="HttpOz\Hook\HookServiceProvider"
```

## Middleware
This package comes with `ValidateHookMiddleware`. You need to add it to your `app/Http/Kernel.php`.

```php
<?php
/**
 * The application's route middleware.
 *
 * @var array
 */
protected $routeMiddleware = [

    // ...

    'validateHook' => \HttpOz\Hook\Http\Middleware\ValidateHookMiddleware::class,
];
```

Now you can add this middleware to your routes. You will also need the prefix, you can call it anything you want but the hook id itself should be the second segment in your url.
```php
<?php

// Route group
Route::group(['prefix' => 'hooks/{hook}', 'middleware' => 'validateHook'], function(){
    Route::resource('notification', 'NotificationController');
});
```