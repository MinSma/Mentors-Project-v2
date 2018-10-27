<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Rating;

/**
 * Class RatingsRepository
 * @package App\Repositories
 */
class RatingsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Rating::class;
    }
}