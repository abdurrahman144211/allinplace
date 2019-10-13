<?php

namespace App\Jobs;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
//use Illuminate\Queue\SerializesModels;

class UserViewedListing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    public $user, $listing;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $viewed = $this->user->viewedListings;

        if($this->listingViewedBefore($viewed)) {
            $this->incrListingViews($viewed);
        } else {
            $this->initialViewRecord();
        }
    }

    /**
     * @param $viewed
     * @return mixed
     */
    protected function listingViewedBefore($viewed)
    {
        return $viewed->contains($this->listing);
    }

    /**
     * @param $viewed
     */
    protected function incrListingViews($viewed)
    {
        $viewed->where('id', $this->listing->id)->first()->pivot->increment('count');
    }

    protected function initialViewRecord()
    {
        $this->user->viewedListings()->attach($this->listing, [
            'count' => 1
        ]);
    }
}
