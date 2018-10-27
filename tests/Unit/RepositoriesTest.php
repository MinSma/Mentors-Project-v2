<?php

namespace Tests\Unit;

use App\Models\Mentor;
use App\Models\Student;
use App\Repositories\MentorsRepository;
use App\Repositories\StudentsRepository;
use App\Repositories\UsersRepository;
use App\User;
use Tests\TestCase;

class RepositoriesTest extends TestCase
{
    public function testStudentsRepository()
    {
        $mock = $this->createMock(StudentsRepository::class);

        $mock->method('model')
            ->willReturn(Student::class);

        $this->assertEquals(Student::class, $mock->model());
    }

    public function testMentorsRepository()
    {
        $mock = $this->createMock(MentorsRepository::class);

        $mock->method('model')
            ->willReturn(Mentor::class);

        $this->assertEquals(Mentor::class, $mock->model());
    }

    public function testUsersRepository()
    {
        $mock = $this->createMock(UsersRepository::class);

        $mock->method('model')
            ->willReturn(User::class);

        $this->assertEquals(User::class, $mock->model());
    }
}
