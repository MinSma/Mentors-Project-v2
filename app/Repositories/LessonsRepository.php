<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Lesson;


/**
 * Class LessonsRepository
 * @package App\Repositories
 */
class LessonsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Lesson::class;
    }
}