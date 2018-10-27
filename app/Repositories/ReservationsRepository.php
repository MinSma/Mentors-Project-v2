<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Reservation;

/**
 * Class ReservationsRepository
 * @package App\Repositories
 */
class ReservationsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Reservation::class;
    }
}