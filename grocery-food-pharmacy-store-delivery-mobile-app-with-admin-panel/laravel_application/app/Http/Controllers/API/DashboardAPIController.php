<?php

namespace App\Http\Controllers\API;

use App\Criteria\Earnings\EarningOfUserCriteria;
use App\Criteria\Markets\MarketsOfManagerCriteria;
use App\Criteria\Orders\OrdersOfUserCriteria;
use App\Criteria\Products\ProductsOfUserCriteria;
use App\Repositories\EarningRepository;
use App\Repositories\MarketRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PaymentRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Exceptions\RepositoryException;

class DashboardAPIController extends Controller
{
    /** @var  OrderRepository */
    private $orderRepository;

    /** @var  MarketRepository */
    private $marketRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    public function __construct(OrderRepository $orderRepo, EarningRepository $earningRepository, MarketRepository $marketRepo, ProductRepository $productRepository)
    {
        parent::__construct();
        $this->orderRepository = $orderRepo;
        $this->marketRepository = $marketRepo;
        $this->productRepository = $productRepository;
        $this->earningRepository = $earningRepository;
    }

    /**
     * Display a listing of the Faq.
     * GET|HEAD /faqs
     * @param  int $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function manager($id, Request $request)
    {
        $statistics = [];
        try{

            $this->earningRepository->pushCriteria(new EarningOfUserCriteria(auth()->id()));
            $earning['description'] = 'total_earning';
            $earning['value'] = $this->earningRepository->all()->sum('market_earning');
            $statistics[] = $earning;

            $this->orderRepository->pushCriteria(new OrdersOfUserCriteria(auth()->id()));
            $ordersCount['description'] = "total_orders";
            $ordersCount['value'] = $this->orderRepository->all('orders.id')->count();
            $statistics[] = $ordersCount;

            $this->marketRepository->pushCriteria(new MarketsOfManagerCriteria(auth()->id()));
            $marketsCount['description'] = "total_markets";
            $marketsCount['value'] = $this->marketRepository->all('markets.id')->count();
            $statistics[] = $marketsCount;

            $this->productRepository->pushCriteria(new ProductsOfUserCriteria(auth()->id()));
            $productsCount['description'] = "total_products";
            $productsCount['value'] = $this->productRepository->all('products.id')->count();
            $statistics[] = $productsCount;


        } catch (RepositoryException $e) {
            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($statistics, 'Statistics retrieved successfully');
    }
}
