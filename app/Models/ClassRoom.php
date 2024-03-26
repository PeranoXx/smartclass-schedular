<?php

namespace App\Models;

use App\Models\LactureTiming as ModelsLactureTiming;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'class_rooms';

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        if(auth('institute')->check()){
            static::addGlobalScope('institute', function (Builder $builder) {
                $builder->where('institute_id', authUser()->id);
            });
        }
    }

    public function batch()
    {
        return $this->hasMany(Batch::class,'class_room_id','id');
    }

    public function subject()
    {
        return $this->hasMany(Subject::class,'class_room_id','id');
    }

    public function user_assign_subject()
    {
        return $this->hasMany(UserAssignSubject::class,'class_room_id','id');
    }

    public function assign_lectures()
    {
        return $this->hasMany(AssignLecture::class,'class_room_id','id');
    }
}
