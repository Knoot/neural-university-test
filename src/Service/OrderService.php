<?php

namespace App\Service;

use App\Repository\OrderRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class OrderService
{
    public function __construct(
        private OrderRepository $repo,
    ) {
    }

    public function getOrders(int $pageLimit, int $offset): Paginator
    {
        return $this->repo->getOrdersPaginator($pageLimit, $offset);
    }
}