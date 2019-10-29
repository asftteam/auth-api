<?php

declare(strict_types=1);

namespace App\Telegram\Presentation\Actions;

use App\Telegram\Presentation\Presenters\UserPresenter;
use App\User;
use Illuminate\Contracts\Support\Responsable;

class RetrieveByTokenAction
{
    public function __invoke(int $userId, string $rememberToken): Responsable
    {
        $user = User::findOrFail($userId);

        abort_unless(hash_equals($user->remember_token, $rememberToken), 401);

        return (new UserPresenter($user));
    }
}
