<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
 * Application bindings
 */

$app->singleton(\App\Bgmenu\OutputFormatter\ResponseFormatterFactory::class, function () {
    return new \App\Bgmenu\OutputFormatter\ResponseFormatterFactory(config('response-formatter-map'));
});

$app->bind(\App\Bgmenu\Services\User\CreateValidator::class, function () {
    return new \App\Bgmenu\Services\User\CreateValidator(config('validation.user-create'));
});

$app->bind(\App\Bgmenu\Services\User\UpdateValidator::class, function () {
    return new \App\Bgmenu\Services\User\UpdateValidator(config('validation.user-update'));
});

$app->bind(\App\Bgmenu\Services\Product\CreateValidator::class, function () {
    return new \App\Bgmenu\Services\Product\CreateValidator(config('validation.product-create'));
});

$app->bind(\App\Bgmenu\Services\Product\UpdateValidator::class, function () {
    return new \App\Bgmenu\Services\Product\UpdateValidator(config('validation.product-update'));
});

$app->bind(\App\Bgmenu\Services\Order\CreateValidator::class, function () {
    return new \App\Bgmenu\Services\Order\CreateValidator(config('validation.order-create'));
});

$app->bind(\App\Bgmenu\Services\Order\UpdateValidator::class, function () {
    return new \App\Bgmenu\Services\Order\UpdateValidator(config('validation.order-update'));
});

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
