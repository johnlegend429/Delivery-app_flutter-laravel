<?php

namespace App\Events;

use App\Models\Market;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MarketChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $newMarket;

    public $oldMarket;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Market $newMarket, Market $oldMarket)
    {
        //
        $this->newMarket = $newMarket;
        $this->oldMarket = $oldMarket;
    }

}
