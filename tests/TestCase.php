<?php

namespace Khalin\Meta\Test;

use Khalin\Meta\MetaTagsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            MetaTagsServiceProvider::class,
        ];
    }
}
