<?php

declare(strict_types=1);

use App\Telegram\Presentation\Actions\RetrieveByIdAction;
use App\Telegram\Presentation\Actions\RetrieveByTokenAction;
use App\Telegram\Presentation\Actions\UpdateRememberTokenAction;

Route::prefix('telegram')->group(function () {
    Route::get('users/{telegramUserId}', RetrieveByIdAction::class);
});

Route::get('users/{userId}/{rememberToken}', RetrieveByTokenAction::class);

Route::patch('users/{userId}', UpdateRememberTokenAction::class);
