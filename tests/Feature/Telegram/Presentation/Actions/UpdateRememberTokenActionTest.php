<?php

declare(strict_types=1);

namespace Tests\Feature\Telegram\Presentation\Actions;

use App\User;
use Illuminate\Http\Response;
use Tests\TestCase;

class UpdateRememberTokenActionTest extends TestCase
{
    /** @test */
    public function it_updates_user_remember_token()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->patchJson("/users/{$user->getKey()}", ['remember_token' => '1234567890abcdef'])
            ->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertEquals('1234567890abcdef', $user->fresh()->getRememberToken());
    }
}
