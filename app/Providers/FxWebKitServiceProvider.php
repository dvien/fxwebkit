<?php namespace Fxweb\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class FxWebKitServiceProvider
 * @package App\Providers
 */
class FxWebKitServiceProvider extends ServiceProvider {

	/**
	 *
	 */
	public function boot()
	{
		//
	}

	/**
	 *
	 */
	public function register()
	{
		$this->app->bind(
			'Fxweb\Repositories\Admin\Mt4User\Mt4UserContract',
			'Fxweb\Repositories\Admin\Mt4User\EloquentMt4UserRepository'
		);

		$this->app->bind(
			'Fxweb\Repositories\Admin\Mt4Group\Mt4GroupContract',
			'Fxweb\Repositories\Admin\Mt4Group\EloquentMt4GroupRepository'
		);

		$this->app->bind(
			'Fxweb\Repositories\Admin\Mt4Trade\Mt4TradeContract',
			'Fxweb\Repositories\Admin\Mt4Trade\EloquentMt4TradeRepository'
		);
	}
}