<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
    ];

    protected $appends = [
        'ownMessage',
    ];

    public function getOwnMessageAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    public function formattedCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }

    public function user() : BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
