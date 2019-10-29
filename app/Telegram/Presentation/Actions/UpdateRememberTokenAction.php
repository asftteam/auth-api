<?php

declare(strict_types=1);

namespace App\Telegram\Presentation\Actions;

use App\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class UpdateRememberTokenAction
{
    use ValidatesRequests;

    public function __invoke(Request $request, int $userId)
    {
        $this->validate($request, [
            'remember_token' => ['required', 'max:60'],
        ]);

        $user = User::findOrFail($userId);

        $user->remember_token = $request->input('remember_token');

        $user->save();

        return response()->noContent();
    }
}
