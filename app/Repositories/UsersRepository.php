<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\User;

/**
 * Class UsersRepository
 * @package App\Repositories
 */
class UsersRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }
}