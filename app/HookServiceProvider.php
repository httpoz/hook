<?php
    
    namespace HttpOz\Hook;
    
    use Illuminate\Support\ServiceProvider;
    
    
    class RolesServiceProvider extends ServiceProvider
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
    }