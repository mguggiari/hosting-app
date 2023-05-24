<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as BaseUser;
use Illuminate\Notifications\Notifiable;
class User extends BaseUser
{
//    use HasFactory;
    use Notifiable;

    protected $primaryKey = "user_id";


    protected $hidden = ["password", "remember_token"];
}