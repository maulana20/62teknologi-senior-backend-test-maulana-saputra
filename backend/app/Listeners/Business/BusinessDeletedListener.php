<?php

namespace App\Listeners\Tenant;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use App\Events\Business\BusinessDeletedEvent;

class TenantDeletedListener
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
        foreach ($event->business->images as $images) {
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }
        foreach ($event->business->reviews as $reviews) {
            $reviews->delete();
        }
    }
}
