<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Blocking;

/**
 * Class BlockingRepository
 * @package App\Repositories
 */
class BlockingRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Blocking::class;
    }
}