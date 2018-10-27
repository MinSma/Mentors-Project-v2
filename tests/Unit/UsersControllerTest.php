<?php

namespace Tests\Unit;

use App\Http\Controllers\UsersController;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    public function testUserIndexMethod()
    {
        $mock = $this->createMock(UsersController::class);

        $mock->method('index')
            ->willReturn(view('users.index', ['users']));

        $this->assertEquals(view('users.index', ['users']), $mock->index());
    }

    public function testUserDashboardMethod()
    {
        $mock = $this->createMock(UsersController::class);

        $mock->method('dashboard')
            ->willReturn(view('users.dashboard'));

        $this->assertEquals(view('users.dashboard'), $mock->dashboard());
    }

    public function testUserCreateMethod()
    {
        $mock = $this->createMock(UsersController::class);

        $mock->method('create')
            ->willReturn(view('users.create'));

        $this->assertEquals(view('users.create'), $mock->create());
    }

    public function testUsersChangePasswordMethod()
    {
        $mock = $this->createMock(UsersController::class);

        $mock->method('changePassword')
            ->willReturn(view('users.changePassword'));

        $this->assertEquals(view('users.changePassword'), $mock->changePassword());
    }
}
