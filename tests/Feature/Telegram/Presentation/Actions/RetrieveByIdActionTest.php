<?php

declare(strict_types=1);

namespace Tests\Feature\Telegram\Presentation\Actions;

use App\Telegram\Domain\Models\TelegramUser;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RetrieveByIdActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_is_retrieved_by_telegram_id()
    {
        $user = factory(User::class)->create();

        $telegramUser = factory(TelegramUser::class)->create([
            'user_id' => $user->getKey(),
        ]);

        $this->getJson("/telegram/users/{$telegramUser->getKey()}")
            ->assertStatus(200)
            ->assertExactJson([
                'id' => $user->getKey(),
                'name' => $user->name,
                'avatar' => $user->avatar,
                'remember_token' => $user->remember_token,
            ]);
    }
}
