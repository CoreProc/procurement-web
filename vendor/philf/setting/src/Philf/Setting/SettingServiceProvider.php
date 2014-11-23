<?php namespace Philf\Setting;

use Illuminate\Support\ServiceProvider;
use Philf\Setting\interfaces\LaravelFallbackInterface;

class SettingServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('philf/setting');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['setting'] = $this->app->share(function($app)
        {
            $path     = $app['config']['setting::setting.path'];
            $filename = $app['config']['setting::setting.filename'];
            
            return new Setting($path, $filename, $app['config']['setting::setting.fallback'] ? new LaravelFallbackInterface() : null);
        });
        
        $this->app->booting(function($app)
        {
            if ($app['config']['setting::setting.autoAlias'])
            {
                $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                $loader->alias('Setting', 'Philf\Setting\Facades\Setting');
            }
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('setting');
    }

}
