<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /** @test */
    public function role_can_ask_in_string_in_user_model()
    {
        $this->assertTrue((new User())->hasRole("Admin"));
        $this->assertFalse((new User())->hasRole("Super Admin"));

        $this->assertTrue((new User())->hasRole(["Admin", "Editor"]));
        $this->assertFalse((new User())->hasRole(["Marketor", "Editor"]));
    }

    /**
     * @dataProvider userRoleDataProvider
     *
     * @param string|array $role
     * @param bool $expected
     * @return void
     *
     * @test
     */
    public function it_returns_true_if_user_has_role($role, $expected)
    {
        $this->assertEquals($expected, (new User())->hasRole($role));
    }

    public function userRoleDataProvider(): array
    {
        return [
            ["Admin", true],
            ["Editor", False],
            [["Admin", "Editor"], true]
        ];
    }
}
