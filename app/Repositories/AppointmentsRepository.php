<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Appointment;

class AppointmentsRepository extends Repository
{

    public function model(): string
    {
        return Appointment::class;
    }
}