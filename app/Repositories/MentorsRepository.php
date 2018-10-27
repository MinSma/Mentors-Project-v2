<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Mentor;

/**
 * Class MentorsRepository
 * @package App\Repositories
 */
class MentorsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Mentor::class;
    }
}