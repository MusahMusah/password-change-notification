<?php

namespace MusahMusah\PasswordChangeNotification\Contracts;

use Illuminate\Mail\Mailable;

interface PasswordChangedNotificationContract
{
    public static function bootObservePasswordChangeMail(): void;

    public function passwordColumnName(): string;

    public function emailColumnName(): string;

    public function nameColumnName(): string;

    public function passwordChangedNotificationMail(): Mailable;

    public function isPasswordChanged(): bool;

    public function shouldPasswordChangedNotificationMailBeQueued(): bool;

    public function sendPasswordChangedNotification(): void;
}
