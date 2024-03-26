<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class AssignLecture extends Model
{
    use HasFactory;

    protected $table = 'assign_lactures';

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
        return $this->belongsTo(ClassRoom::class,'class_room_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
