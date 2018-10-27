<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Student;

/**
 * Class StudentsRepository
 * @package App\Repositories
 */
class StudentsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Student::class;
    }
}