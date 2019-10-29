<?php

declare(strict_types=1);

namespace App\Telegram\Presentation\Presenters;

use App\User;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Responsable;

class UserPresenter implements Arrayable, Responsable
{
    /** @var User */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->user->id,
            'name' => $this->user->name,
            'avatar' => $this->user->avatar,
            'remember_token' => $this->user->getRememberToken(),
        ];
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return response()->json($this->toArray());
    }
}
