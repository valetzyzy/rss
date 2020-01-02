<?php

namespace App\Providers;

use App\Parser\Parser;
use App\Parser\ParserInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParserInterface::class, function ($app) {
            return new Parser();
        });
    }

    public function provides()
    {
        return [ParserInterface::class];
    }
}
