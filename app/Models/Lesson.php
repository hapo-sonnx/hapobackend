<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'requirement',
    ];
    
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons', 'user_id', 'lesson_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'lesson_id');
    }

}
