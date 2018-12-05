<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\BankAccount;

class BankAccountsRepository extends Repository
{

    public function model(): string
    {
        return BankAccount::class;
    }
}