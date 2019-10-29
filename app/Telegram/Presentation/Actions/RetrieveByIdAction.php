<?php

declare(strict_types=1);

namespace App\Telegram\Presentation\Actions;

use App\Telegram\Domain\Models\TelegramUser;
use App\Telegram\Presentation\Presenters\UserPresenter;
use Illuminate\Contracts\Support\Responsable;

class RetrieveByIdAction
{
    public function __invoke(int $telegramUserId): Responsable
    {
        $user = TelegramUser::findOrFail($telegramUserId)->user;

        return (new UserPresenter($user));
    }
}
