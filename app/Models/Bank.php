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
        'status',
    ];

    //call user model and get data (relationship one to many)
    public function users(){
        return $this->hasMany(User::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }
}
