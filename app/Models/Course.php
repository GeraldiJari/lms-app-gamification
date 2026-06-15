<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Material;
use App\Models\Assignment;
use App\Models\Quiz;
use App\Models\Session;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'teacher_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->where('role', 'student');
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
