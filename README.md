# A simple laravel package to send mail notification to the user when their password is changed.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/musahmusah/password-change-notification.svg?style=flat-square)](https://packagist.org/packages/musahmusah/password-change-notification)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/musahmusah/password-change-notification/run-tests?label=tests)](https://github.com/musahmusah/password-change-notification/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/musahmusah/password-change-notification/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/musahmusah/password-change-notification/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/musahmusah/password-change-notification.svg?style=flat-square)](https://packagist.org/packages/musahmusah/password-change-notification)

A simple package to send mail notification to the user when their password is changed.

## Installation

You can install the package via composer:

```bash
composer require musahmusah/password-change-notification
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="password-change-notification-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="password-change-notification-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="password-change-notification-views"
```

## Usage
After installing the package, you can go to your `User` model or any other model that has password and email fields and use `ObservePasswordChangeMail` trait and implement `PasswordChangedNotificationContract` interface

```php
use MusahMusah\PasswordChangeNotification\Contracts\PasswordChangedNotificationContract;
use MusahMusah\PasswordChangeNotification\Traits\ObservePasswordChangeMail;

class User extends Authenticatable implements PasswordChangedNotificationContract
{
    use ObservePasswordChangeMail;
}
```

Now whenever you change the password of the user, a mail will be automatically sent to that user. Isn't that easy.

By default the package will assume the columns name to be `email` and `password`. But if you have different column name for those fields then you can modify those as well.

Let's say you have the `email` column as `user_email` in your `User` model or any other model, then you can add `emailColumnName` method on the `User` model and return `user_email` from here like so:

```php
public function emailColumnName(): string
{
    return 'user_email';
}
```

You can also modify the `password` column by adding this method.

```php
public function passwordColumnName(): string
{
    return 'user_password';
}
```

You can also modify the `name` column by adding this method. This will be used in the mail like Hi `Adam`.

```php
public function nameColumnName(): string
{
    return 'full_name';
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [MusahMusah](https://github.com/MusahMusah)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
