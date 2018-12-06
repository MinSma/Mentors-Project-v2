<?php
declare(strict_types = 1);

namespace App\Repositories;


use App\Models\Order;

class OrdersRepository extends Repository
{
    public function model(): string
    {
        return Order::class;
    }
}