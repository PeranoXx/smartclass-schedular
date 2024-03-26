<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAssignSubject extends Model
{
    use HasFactory;

    protected $table = 'user_assign_subjects';

    protected $guarded = ['id'];

    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class,'class_room_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id','id');
    }
}
