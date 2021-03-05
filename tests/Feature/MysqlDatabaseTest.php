<?php

namespace Tests\Feature;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MysqlDatabaseTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->setMysqlDatabase();

        $this->artisan("migrate");
        $this->app[Kernel::class]->setArtisan(null);
    }

    /** @test */
    public function it_is_mysql_database()
    {

    }

    public function tearDown(): void
    {
        $this->setSqliteDatabase();
    }
}
