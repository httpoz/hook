<?php
    
    namespace HttpOz\Hook;
    
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Database\Eloquent\Factory as EloquentFactory;
    
    
    class HookServiceProvider extends ServiceProvider
    {
        
        /**
         * Bootstrap the application services.
         *
         * @return void
         */
        public function boot()
        {
            
            $this->publishes([
                __DIR__ . '/../database/migrations/2018_03_26_062259_create_hooks_table.php' => database_path('migrations') . '/2018_03_26_062259_create_hooks_table.php',
            ], 'migrations');
        }
    
        public function register()
        {
            $this->registerEloquentFactoriesFrom(__DIR__.'/../database/factories');
        }
    
        public function registerEloquentFactoriesFrom($path)
        {
            $this->app->make(EloquentFactory::class)->load($path);
        }
    }