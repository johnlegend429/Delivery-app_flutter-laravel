<?php
/**
 * File name: DriversOfUserCriteria.php
 * Last modified: 2020.08.15 at 20:25:29
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Criteria\Users;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class DriversOfUserCriteria.
 *
 * @package namespace App\Criteria\Drivers;
 */
class DriversOfUserCriteria implements CriteriaInterface
{
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
        if(auth()->user()->hasRole('admin')){
            return $model->whereHas("roles", function($q){ $q->where("name", "driver"); });
        }else if (auth()->user()->hasRole('manager')){
            // markets of this user
            $marketsIds = array_column(auth()->user()->markets->toArray(), 'id');

            return $model->join('driver_markets','driver_markets.user_id','=','users.id')
                ->whereIn('driver_markets.market_id',$marketsIds)
                ->distinct('driver_markets.user_id')
                ->select('users.*');
        }
    }
}
