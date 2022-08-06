<?php

namespace App\Providers;

use App\Enums\RideStatus;
use App\Models\Notification;
use App\Models\Ride;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        Schema::defaultStringLength(191);
        view()->composer('*', function ($view) {
            $notifications = [];
            $ride_count = 0;
  $unread_count = 0;
            $count = 0;
            if (Auth::check()) {
                $all_notifications = Notification::query()->where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
                foreach ($all_notifications as $notification) {
                    if (!$notification->is_read) {
                        array_push($notifications, $notification);
                        $unread_count++;
                        $count++;
                    } else if ($count < 5) {
                        array_push($notifications, $notification);
                        $count++;
                    }
                }
                $ride_count = Ride::query()->whereIn('status', [RideStatus::PENDING, RideStatus::CONFIRMED, RideStatus::MATCHED])->whereHas('car', function (Builder $q) {
                    $q->where('user_id', Auth::id());
                })->count();
            }
$view->with(['notifications' => $notifications, 'unread_count' => $unread_count, 'ride_count' => $ride_count]);
        });
    }
}
