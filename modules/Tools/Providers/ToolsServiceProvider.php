<?php namespace Modules\Tools\Providers;

use Illuminate\Support\ServiceProvider;

class ToolsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the application events.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->registerConfig();
		$this->registerTranslations();
		$this->registerViews();
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Modules\Tools\Repositories\HolidayContract',
			'Modules\Tools\Repositories\EloquentHolidayContractRepository'
		);
	}

	/**
	 * Register config.
	 * 
	 * @return void
	 */
	protected function registerConfig()
	{
		$this->publishes([
		    __DIR__.'/../../../config/toolsConfig.php' => config_path('tools.php'),
		]);
		$this->mergeConfigFrom(
		    __DIR__.'/../../../config/toolsConfig.php','tools'
		);
	}

	/**
	 * Register views.
	 * 
	 * @return void
	 */
	public function registerViews()
	{
		$viewPath = base_path('resources/views/modules/tools');

		$sourcePath = __DIR__.'/../Resources/views';

		$this->publishes([
			$sourcePath => $viewPath
		]);

		$this->loadViewsFrom([$viewPath, $sourcePath], 'tools');
	}

	/**
	 * Register translations.
	 * 
	 * @return void
	 */
	public function registerTranslations()
	{
		$langPath = base_path('resources/lang/modules/tools');

		if (is_dir($langPath)) {
			$this->loadTranslationsFrom($langPath, 'tools');
		} else {
			$this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'tools');
		}
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
