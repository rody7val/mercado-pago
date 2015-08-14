<?php namespace LivePixel\MercadoPago\Providers;

use Illuminate\Support\ServiceProvider;
use LivePixel\MercadoPago\MP;

class MercadoPagoServiceProvider extends ServiceProvider 
{

	protected $mp_app_id;
	protected $mp_app_secret;

	public function boot()
	{
		// laravel 4:
		$this->package('livepixel/mercado-pago');

		$this->mp_app_id     = getenv('MP_APP_ID');
		$this->mp_app_secret = getenv('MP_APP_SECRET');
	}

	public function register()
	{
		$this->app->singleton('MP', function(){
			return new MP($this->mp_app_id, $this->mp_app_secret);
		});
	}
}