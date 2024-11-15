<?php

namespace AwaluddinKasim\OneSignalPushNotification;

use Illuminate\Support\ServiceProvider;

class OneSignalServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    // Publish configuration
    $this->publishes([
      __DIR__ . '/../config/onesignal.php' => config_path('onesignal.php')
    ]);
  }
}
