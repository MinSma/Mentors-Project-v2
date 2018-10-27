<?php

namespace Tests\Unit;

use App\Models\Mentor;
use App\Models\Student;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeedsTest extends TestCase
{
    use RefreshDatabase;

    public function testStudentsSeed() {
        $students = factory(Student::class, 30)->create();

        $this->assertEquals(count($students), 30);
    }

    public function testMentorsSeed() {
        $mentors = factory(Mentor::class, 20)->create();

        $this->assertEquals(count($mentors), 20);
    }

    public function testUsersSeed() {
        $users = factory(User::class, 15)->create();

        $this->assertEquals(count($users), 15);
    }
}
