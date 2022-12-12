<?php

declare(strict_types=1);

namespace MusahMusah\PasswordChangeNotification\Traits;

use MusahMusah\PasswordChangeNotification\Mail\PasswordChangedNotificationMail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

trait ObservePasswordChangeMail
{
    public static function bootObservePasswordChangeMail(): void
    {
        static::updated(function ($user) {
            $user->sendPasswordChangedNotification();
        });
    }

    public function isPasswordChanged(): bool
    {
        return $this->wasChanged($this->passwordColumnName());
    }

    public function nameColumnName(): string
    {
        return 'name';
    }

    public function emailColumnName(): string
    {
        return 'email';
    }

    public function passwordColumnName(): string
    {
        return 'password';
    }

    public function passwordChangedNotificationMail(): Mailable
    {
        return new PasswordChangedNotificationMail($this);
    }

    public function shouldPasswordChangedNotificationMailBeQueued(): bool
    {
        return false;
    }

    public function sendPasswordChangedNotification(): void
    {
        if (!$this->isPasswordChanged()) {
            return;
        }

        $mail = Mail::to($this->getRawOriginal($this->emailColumnName()));

        if ($this->shouldPasswordChangedNotificationMailBeQueued()) {
            $mail->queue($this->passwordChangedNotificationMail());

            return;
        }

        $mail->send($this->passwordChangedNotificationMail());
    }
}
