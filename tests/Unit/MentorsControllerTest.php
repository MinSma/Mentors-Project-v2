<?php

namespace Tests\Unit;

use App\Http\Controllers\MentorsController;
use Tests\TestCase;

class MentorsControllerTest extends TestCase
{
    public function testMentorIndexMethod()
    {
        $mock = $this->createMock(MentorsController::class);

        $mock->method('index')
            ->willReturn(view('mentors.index', ['mentors']));

        $this->assertEquals(view('mentors.index', ['mentors']), $mock->index());
    }

    public function testMentorDashboardMethod()
    {
        $mock = $this->createMock(MentorsController::class);

        $mock->method('dashboard')
            ->willReturn(view('mentors.dashboard'));

        $this->assertEquals(view('mentors.dashboard'), $mock->dashboard());
    }

    public function testMentorCreateMethod()
    {
        $mock = $this->createMock(MentorsController::class);

        $mock->method('create')
            ->willReturn(view('mentors.create'));

        $this->assertEquals(view('mentors.create'), $mock->create());
    }

    public function testMentorChangePasswordMethod()
    {
        $mock = $this->createMock(MentorsController::class);

        $mock->method('changePassword')
            ->willReturn(view('mentors.changePassword'));

        $this->assertEquals(view('mentors.changePassword'), $mock->changePassword());
    }
}
