<?php

namespace MusahMusah\PasswordChangeNotification;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use MusahMusah\PasswordChangeNotification\Commands\PasswordChangeNotificationCommand;

class PasswordChangeNotificationServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('password-change-notification')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_password-change-notification_table')
            ->hasCommand(PasswordChangeNotificationCommand::class);
    }
}
