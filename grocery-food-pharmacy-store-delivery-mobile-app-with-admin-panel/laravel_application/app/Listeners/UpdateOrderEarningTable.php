<?php
/**
 * File name: UpdateOrderEarningTable.php
 * Last modified: 2020.05.05 at 17:03:49
 * Author: SmarterVision - https://codecanyon.net/user/smartervision
 * Copyright (c) 2020
 *
 */

namespace App\Listeners;

use App\Criteria\Earnings\EarningOfMarketCriteria;
use App\Repositories\EarningRepository;

class UpdateOrderEarningTable
{
    /**
     * @var EarningRepository
     */
    private $earningRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(EarningRepository $earningRepository)
    {
        //
        $this->earningRepository = $earningRepository;
    }

    /**
     * Handle the event.
     *oldOrder
     * updatedOrder
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->oldStatus != $event->updatedOrder->payment->status) {
            $this->earningRepository->pushCriteria(new EarningOfMarketCriteria($event->updatedOrder->productOrders[0]->product->market->id));
            $market = $this->earningRepository->first();
//            dd($market);
            $amount = 0;

            // test if order delivered to client
            if (!empty($market)) {
                foreach ($event->updatedOrder->productOrders as $productOrder) {
                    $amount += $productOrder['price'] * $productOrder['quantity'];
                }
                if ($event->updatedOrder->payment->status == 'Paid') {
                    $market->total_orders++;
                    $market->total_earning += $amount;
                    $market->admin_earning += ($market->market->admin_commission / 100) * $amount;
                    $market->market_earning += ($amount - $market->admin_earning);
                    $market->delivery_fee += $event->updatedOrder->delivery_fee;
                    $market->tax += $amount * $event->updatedOrder->tax / 100;
                    $market->save();
                } elseif ($event->oldStatus == 'Paid') {
                    $market->total_orders--;
                    $market->total_earning -= $amount;
                    $market->admin_earning -= ($market->market->admin_commission / 100) * $amount;
                    $market->market_earning -= $amount - (($market->market->admin_commission / 100) * $amount);
                    $market->delivery_fee -= $event->updatedOrder->delivery_fee;
                    $market->tax -= $amount * $event->updatedOrder->tax / 100;
                    $market->save();
                }
            }

        }
    }
}
