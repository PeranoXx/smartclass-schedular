<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

    protected $table = 'assign_subjects';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        if(auth('institute')->check()){
            static::addGlobalScope('institute', function (Builder $builder) {
                $builder->where('institute_id', authUser()->id);
            });
        }
    }

    public function class_room()
    {
        return $this->hasOne(ClassRoom::class,'id','class_room_id');
    }

    public function subject()
    {
        return $this->hasOne(Subject::class,'id','subject_id');
    }
}
