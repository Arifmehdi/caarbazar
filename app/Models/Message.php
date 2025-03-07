<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'is_seen',
        // Add other fillable attributes here if needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class,'lead_id');
    }
}
