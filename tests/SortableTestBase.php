<?php

class SortableTestBase extends Orchestra\Testbench\TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loadMigrationsFrom([
            '--database' => 'testbench',
            '--realpath' => realpath(__DIR__.'/migrations'),
        ]);
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/../src';

        $app['config']->set('database.default', 'testbench');
        $app['config']->set(
            'database.connections.testbench',
            array(
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            )
        );
    }
}
