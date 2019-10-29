<?php

declare(strict_types=1);

namespace App\Telegram\Domain\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TelegramUser extends Model
{
    protected $table = 'telegram_users';

    protected $fillable = ['*'];

    protected $guarded = [];

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
