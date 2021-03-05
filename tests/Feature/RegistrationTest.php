<?php

namespace Tests\Feature;

use App\Rules\Recaptcha;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        app()->singleton(Recaptcha::class, function () {
            $m = Mockery::mock(Recaptcha::class);
            $m->shouldReceive('passes')->andReturn(true);

            return $m;
        });
    }

    /** @test */
    public function it_can_register_user()
    {
        $this->withoutExceptionHandling();

        $this->post("register", ["recaptcha" => "I am random Recaptcha."])
            ->assertSessionHasNoErrors()
            ->assertSessionMissing("error")
            ->assertSessionHas("success");
    }
}
