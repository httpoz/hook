<?php
    
    namespace HttpOz\Hook\Tests;
    
    use Orchestra\Testbench\TestCase as Orchestra;
    
    class TestCase extends Orchestra
    {
        /**
         * Setup the test environment.
         */
        public function setUp()
        {
            parent::setUp();
            $this->loadLaravelMigrations(['--database' => 'testbench']);
            $this->setUpDatabase($this->app);
            $this->withFactories(__DIR__ . '/../database/factories');
        }
        
        protected function getPackageProviders($app)
        {
            return [
                \Orchestra\Database\ConsoleServiceProvider::class
            ];
        }
        
        /**
         * Define environment setup.
         *
         * @param  \Illuminate\Foundation\Application $app
         *
         * @return void
         */
        public function getEnvironmentSetUp($app)
        {
            $app['config']->set('database.default', 'testbench');
            $app['config']->set('database.connections.testbench', [
                'driver'   => 'sqlite',
                'database' => ':memory:'
            ]);
        }
        
        /**
         * Set up the database.
         *
         * @param \Illuminate\Foundation\Application $app
         */
        protected function setUpDatabase($app)
        {
            include_once __DIR__ . '/../database/migrations/2018_03_26_062259_create_hooks_table.php';
            (new \CreateHooksTable())->up();
        }
    }