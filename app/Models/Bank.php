<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_address',
        'bank_contact_num',
        'email',
        'status',
    ];

        // Inverse One-to-One relationship with User
        // public function user()
        // {
        //     return $this->belongsTo(User::class);
        // }
    
}
