<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'status',
        'time_frame',
        'request',
        'user_responded',
        'bank_id',    //Foreign key
    ];

    public function bankMassage()
    {
        return $this->belongsTo(Bank::class);
    }
}
