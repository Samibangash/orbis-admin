<?php

namespace App\Observers;

use App\Models\Agent;
use App\Models\Announcement;
use App\Notifications\PushNotification;
use Illuminate\Support\Facades\Notification;

class AnnouncementObserver
{
    /**
     * Handle the Announcement "created" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function created(Announcement $announcement)
    {
        $agents = Agent::where('active',1)->get();
        Notification::send($agents ,new PushNotification($agents));
    }

    /**
     * Handle the Announcement "updated" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function updated(Announcement $announcement)
    {
        //
    }

    /**
     * Handle the Announcement "deleted" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function deleted(Announcement $announcement)
    {
        //
    }

    /**
     * Handle the Announcement "restored" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function restored(Announcement $announcement)
    {
        //
    }

    /**
     * Handle the Announcement "force deleted" event.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return void
     */
    public function forceDeleted(Announcement $announcement)
    {
        //
    }
}
