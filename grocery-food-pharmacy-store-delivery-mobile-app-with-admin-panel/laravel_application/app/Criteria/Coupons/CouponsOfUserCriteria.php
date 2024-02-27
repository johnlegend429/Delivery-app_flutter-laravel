<?php
/**
 * File name: CouponsOfUserCriteria.php
 * Last modified: 2020.09.19 at 14:38:37
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Criteria\Coupons;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class CouponsOfUserCriteria.
 *
 * @package namespace App\Criteria\Coupons;
 */
class CouponsOfUserCriteria implements CriteriaInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * CouponsOfUserCriteria constructor.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        if (auth()->user()->hasRole('admin')) {
            return $model;
        }elseif (auth()->user()->hasRole('manager')){
            $markets = $model->join("discountables", "discountables.coupon_id", "=", "coupons.id")
                ->join("user_markets", "user_markets.market_id", "=", "discountables.discountable_id")
                ->where('discountable_type','App\\Models\\Market')
                ->where("user_markets.user_id",$this->userId)
                ->select("coupons.*");

            $products = $model->join("discountables", "discountables.coupon_id", "=", "coupons.id")
                ->join("products", "products.id", "=", "discountables.discountable_id")
                ->where('discountable_type','App\\Models\\product')
                ->join("user_markets", "user_markets.market_id", "=", "products.market_id")
                ->where("user_markets.user_id",$this->userId)
                ->select("coupons.*")
                ->union($markets);
            return $products;
        }else{
            return $model;
        }

    }
}
