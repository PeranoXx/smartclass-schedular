<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LactureTiming extends Model
{
    use HasFactory;

    protected $table = 'lacture_timings';

    protected $guarded = ['id'];
    protected $cast = [
        'weeks' => 'array'
    ];

    protected static function booted(): void
    {
        if(auth('institute')->check()){
            static::addGlobalScope('institute', function (Builder $builder) {
                $builder->where('institute_id', authUser()->id);
            });
        }
    }
}
