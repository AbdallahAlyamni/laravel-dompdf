<?php
namespace Barryvdh\DomPDF;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app['config']->package('barryvdh/laravel-dompdf', __DIR__ . '/../../config');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['dompdf'] = $this->app->share(function($app)
            {
                return new PDF($app['config'], $app['files'], $app['view']);
            });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('dompdf');
	}

}
