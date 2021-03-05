<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @param array        $array
     * @param array|string $key
     *
     * @return array
     */
    public function resetArrayByKey(array $array, $key): array
    {
        if ( is_array($key) ) {
            $array = array_merge($array, $key);
        }

        if ( is_string($key) ) {
            unset($array[$key]);
        }

        return $array;
    }

    public function setMysqlDatabase()
    {
        config()->set('database.default', 'mysql');
        config()->set('database.connections.sqlite.database', 'jobins-test');
    }

    public function setSqliteDatabase()
    {
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');
    }
}
