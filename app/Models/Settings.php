<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    //protected $guarded = [];

    protected $fillable = [
        'name',
        'last_sent',
        'email',
        'phone',
        'subject',
        'message',
        'send_to',
        'send_hour',
        'host',
        'port',
        'username',
        'password',
        'host_mail',
    ];
}
