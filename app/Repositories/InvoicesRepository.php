<?php
declare(strict_types = 1);

namespace App\Repositories;


use App\Models\Invoice;

class InvoicesRepository extends Repository
{
    public function model(): string
    {
        return Invoice::class;
    }
}