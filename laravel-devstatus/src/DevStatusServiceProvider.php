<?php namespace Charan;

use Illuminate\Support\ServiceProvider;

class DevStatusServiceProvider extends ServiceProvider {

   /**
     * Bootstrap the application services.
     *
     * @return void
    */
  public function boot()
  {
    //
    $this->publishes([__DIR__.'/config/DevStatus.php' => config_path('DevStatus.php')]);
  }

  /**
    * Register the application services.
    *
    * @return void
  */
  public function register()
  {
     include __DIR__.'/routes.php';
     // Let Laravel Ioc Container know about our Controller
     $this->app->make('Charan\DevStatusController');
  }

}
