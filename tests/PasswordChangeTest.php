<?php

use Illuminate\Support\Facades\Mail;
use MusahMusah\PasswordChangeNotification\Tests\Model\User;

it('can send mail notification to the user when password is changed', function () {
    Mail::fake();
    $user = User::factory()->create();

    $user->update([
        'password' => \Illuminate\Support\Facades\Hash::make('new_password'),
    ]);

    Mail::assertSent($user->passwordChangedNotificationMail()::class);
});

it('will not send mail notification to the user when password is not changed', function () {
    Mail::fake();
    $user = User::factory()->create();

    $user->update([
        'name' => 'new_name',
    ]);

    Mail::assertNotSent($user->passwordChangedNotificationMail()::class);
});
