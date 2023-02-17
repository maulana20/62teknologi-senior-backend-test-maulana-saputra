<?php

namespace App\Events\Business;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Business;

class BusinessDeletedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $business;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Business $business)
    {
        $this->business = $business;
    }
}
