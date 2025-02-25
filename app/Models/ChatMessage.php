<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';
    protected $fillable = ['user_id', 'message'];

    // Contoh relasi ke model User jika ada
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
