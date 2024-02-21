<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Institute extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table = 'institutes';

    protected $guarded = ['id'];
}
