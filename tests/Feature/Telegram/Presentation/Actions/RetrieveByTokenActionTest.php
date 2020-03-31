<?php

declare(strict_types=1);

namespace Tests\Feature\Telegram\Presentation\Actions;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RetrieveByTokenActionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_is_retrieved_by_user_id_and_token()
    {
        $user = factory(User::class)->create();

        $this->getJson("/users/{$user->getKey()}/{$user->remember_token}")
            ->assertStatus(200)
            ->assertExactJson([
                'id' => $user->getKey(),
                'name' => $user->name,
                'avatar' => $user->avatar,
                'remember_token' => $user->remember_token,
            ]);
    }
}
