<?php

namespace MusahMusah\PasswordChangeNotification\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use MusahMusah\PasswordChangeNotification\PasswordChangeNotificationServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'MusahMusah\\PasswordChangeNotification\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            PasswordChangeNotificationServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_users_table.php.stub';
        $migration->up();
    }
}
