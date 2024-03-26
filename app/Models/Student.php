<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        if(auth('institute')->check()){
            static::addGlobalScope('institute', function (Builder $builder) {
                $builder->where('institute_id', authUser()->id);
            });
        }
    }

    public function getNameAttribute()
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }
}
