<?php

namespace Tests\Unit;

use App\Http\Controllers\StudentsController;
use Tests\TestCase;

class StudentsControllerTest extends TestCase
{
    public function testStudentIndexMethod()
    {
        $mock = $this->createMock(StudentsController::class);

        $mock->method('index')
            ->willReturn(view('students.index', ['students']));

        $this->assertEquals(view('students.index', ['students']), $mock->index());
    }

    public function testStudentDashboardMethod()
    {
        $mock = $this->createMock(StudentsController::class);

        $mock->method('dashboard')
            ->willReturn(view('students.dashboard'));

        $this->assertEquals(view('students.dashboard'), $mock->dashboard());
    }

    public function testStudentCreateMethod()
    {
        $mock = $this->createMock(StudentsController::class);

        $mock->method('create')
            ->willReturn(view('students.create'));

        $this->assertEquals(view('students.create'), $mock->create());
    }

    public function testStudentChangePasswordMethod()
    {
        $mock = $this->createMock(StudentsController::class);

        $mock->method('changePassword')
            ->willReturn(view('students.changePassword'));

        $this->assertEquals(view('students.changePassword'), $mock->changePassword());
    }
}
