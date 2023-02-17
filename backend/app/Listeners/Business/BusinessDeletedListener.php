<?php

namespace App\Listeners\Business;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use App\Events\Business\BusinessDeletedEvent;

class BusinessDeletedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BusinessDeletedEvent $event)
    {
        foreach ($event->business->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }
        foreach ($event->business->reviews as $review) {
            $review->delete();
        }
    }
}
