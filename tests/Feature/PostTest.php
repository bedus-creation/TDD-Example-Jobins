<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_creates_posts_for_valid_data()
    {
        $data = $this->getValidDataForPostForm();

        $this->post(route("posts.store"), $data)
            ->assertSessionHasNoErrors()
            ->assertSessionMissing("error")
            ->assertSessionHas("success");
    }

    /**
     * @dataProvider InvalidPostCreateFormDataProvider
     * @test
     */
    public function it_throws_validation_exception_for_invalid_data($resetData)
    {
        $this->withoutExceptionHandling();

        $this->expectException(ValidationException::class);

        $data = $this->getValidDataForPostForm();

        $data = $this->resetArrayByKey($data, $resetData);

        $this->post(route("posts.store"), $data);
    }

    public function getValidDataForPostForm(): array
    {
        return ["title" => $this->faker->sentence, "description" => $this->faker->paragraph];
    }

    public function InvalidPostCreateFormDataProvider(): array
    {
        return [
            ["title"], // Title is required
            [["title" => "a"]], // Title must be of length at least 3

            ["description"]
        ];
    }


}
