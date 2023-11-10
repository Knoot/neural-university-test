<?php

namespace App\Controller;

use App\Service\OrderService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    private int $pageLimit = 10;

    public function __construct(
        private OrderService $service,
    ) {
    }

    #[Route('/orders', name: 'app_orders')]
    public function index(Request $request): Response
    {
        $page = $request->query->getInt('page', 1);
        $offset = ($page - 1) * $this->pageLimit;
        $paginator = $this->service->getOrders($this->pageLimit, $offset);
        // dd($paginator);

        return $this->render('order/index.html.twig', [
            'orders' => $paginator,
            'offset' => $offset,
            'page'   => $page,
            'next'   => $offset + $this->pageLimit >= $paginator->count() ? 0 : $page + 1,
        ]);
    }
}
