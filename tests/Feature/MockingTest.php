<?php

namespace Tests\Feature;

use App\Domain\Smaregi\Services\SmaregiService;
use App\Infrastructure\Support\SmaregiApi\SmaregiApi;
use App\Services\JobsParser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery\MockInterface;
use Tests\TestCase;

class MockingTest extends TestCase
{

    /** @test */
    public function it_can_lists_stores()
    {
        $response = file_get_contents(__DIR__."/stubs/index.html");

        $this->partialMock(JobsParser::class, function (MockInterface $mock) use ($response) {
            $mock->shouldReceive("getResponse")->andReturn($response);
        });

        dump(app(JobsParser::class)->getResponse());

        $this->markTestSkipped(true);
    }
}
